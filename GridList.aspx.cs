using BLL;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace TaskTracker
{
    public partial class GridList : System.Web.UI.Page
    {
        public string currentUser = "";
        public string title = "";
        public string HeaderTitle = "";
        [Obsolete]
        TransactionBO objTransactionBO = new TransactionBO();

        [Obsolete]
        protected void Page_Load(object sender, EventArgs e)
        {
            currentUser = Session["CurrentUser"] as string;
            title = Session["Title"] as string;

            if (title != null && title == "History")
            {
                HeaderTitle = "History of Tasks";

            }
            else
            {
                HeaderTitle = "Pending Tasks";
            }

            if (currentUser == null || currentUser == String.Empty || currentUser == "")
            {
                Response.Redirect("login.aspx");
            }
            if (!IsPostBack)
            {
                Binddata();
            }
        }

        [Obsolete]
        protected void Binddata()
        {
            using (DataTable dt = objTransactionBO.FetchAll(title, currentUser))
            {
                if (dt != null && dt.Rows.Count > 0)
                {
                    IEnumerable<dynamic> data = dt.Rows.Cast<DataRow>()
                   .GroupBy<DataRow, String>(d => Convert.ToString(d["CompletedOn"]))
                   .Select<IGrouping<String, DataRow>, dynamic>(grp =>
                   {
                       return new
                       {
                           CompletedOn = grp.Key,
                           GroupedData = grp.Select<DataRow, dynamic>(row =>
                           {
                               return new
                               {
                                   id = Convert.ToString(row["id"]),
                                   oid = Convert.ToString(row["oid"]),
                                   Task = Convert.ToString(row["Task"])
                               };
                           })
                       };
                   });

                    RepeaterOuter.Visible = true;
                    RepeaterOuter.DataSource = data;
                    RepeaterOuter.DataBind();
                    lblGrid.Text = String.Empty;
                }
                else
                {
                    RepeaterOuter.Visible = false;

                    lblGrid.Text = "No Tasks Are Found";
                }
            }
        }

        [Obsolete]
        protected void chkSelect_CheckedChanged(object sender, EventArgs e)
        {
            CheckBox chkSelect = (CheckBox)sender;
            RepeaterItem item = (RepeaterItem)chkSelect.NamingContainer;
            Label Lblrpt = (Label)item.FindControl("lblrpt");
            int id = Convert.ToInt32(Lblrpt.Text);

            if (!(chkSelect.Checked))
            {
                if (id != 0 && id > 0)
                {
                    if (title != null && title == "History")
                    {
                        using (DataSet ds = objTransactionBO.PushToPending(id))
                        {
                            if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                            {
                                string Status = (ds.Tables[0].Rows[0]["com"].ToString());

                                if (Status == "1")
                                {
                                    Binddata();
                                }
                            }
                        }
                    }

                }
            }
            else
            {
                if (id != 0 && id > 0)
                {
                    if (title != null && title == "History")
                    {
                    }
                    else
                    {
                        using (DataSet ds = objTransactionBO.TaskCompletedOn(id))
                        {
                            if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                            {
                                string Status = (ds.Tables[0].Rows[0]["com"].ToString());

                                if (Status == "1")
                                {
                                    Binddata();
                                }
                            }
                        }
                    }
                }
            }


        }

        [Obsolete]
        protected void RepeaterInner_ItemCommand(object source, RepeaterCommandEventArgs e)
        {
            if (e.CommandName == "Delete")
            {
                int id = Convert.ToInt32(e.CommandArgument);

                using (DataSet ds = objTransactionBO.DeleteTask(id))
                {
                    if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                    {
                        string Status = (ds.Tables[0].Rows[0]["com"].ToString());

                        if (Status == "1")
                        {
                            Binddata();
                        }

                    }
                }
            }

            if (e.CommandName == "Edit")
            {
                if (title != null && title == "History")
                {
                    CheckBox chk = e.Item.FindControl("chkSelect") as CheckBox;

                    if (chk != null)
                    {
                        chk.Enabled = true;
                    }
                }
            }
        }

        protected void RepeaterInner_ItemDataBound(object sender, RepeaterItemEventArgs e)
        {
            if (title != null && title == "History")
            {
                CheckBox chk = e.Item.FindControl("chkSelect") as CheckBox;
                if (chk != null)
                {
                    chk.Checked = true;
                    chk.Enabled = false;
                }
            }

        }


        protected void Close_Click(object sender, EventArgs e)
        {
            if (title != null && title == "History")
            {
                Response.Redirect("Tasks_History.aspx");
            }
            else
            {
                Response.Redirect("ToDoList.aspx");
            }
        }
    }
}

