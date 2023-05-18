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
    public partial class Tasks_History : System.Web.UI.Page
    {

        public string currentUser = "";
        public string DateIn = "";
        [Obsolete]
        TransactionBO objTransactionBO = new TransactionBO();

        [Obsolete]
        protected void Page_Load(object sender, EventArgs e)
        {
            currentUser = Session["CurrentUser"] as string;
            Session["Title"] = "History";
            DateIn = DateInput.Text;

            if (currentUser == null || currentUser == String.Empty || currentUser == "")
            {
                Response.Redirect("login.aspx");
            }
            if (!IsPostBack)
            {
                DateTime datetimeValue = DateTime.Now;
                DateIn = datetimeValue.ToString("dd-MM-yyyy");
                DateInput.Text = DateIn;
                BindGrid();
            }

        }

        [Obsolete]
        protected void DateInput_TextChanged(object sender, EventArgs e)
        {
            DateIn = DateInput.Text;
            DateInput.Text = DateIn;
            BindGrid();
        }

        [Obsolete]
        protected void BindGrid()
        {


            using (DataSet datagrid = objTransactionBO.Fetch_Order("History", DateIn, currentUser))
            {
                if (datagrid != null && datagrid.Tables.Count > 0 && datagrid.Tables[0].Rows.Count > 0)
                {
                    GridRepeat.Visible = true;
                    GridRepeat.DataSource = datagrid;
                    GridRepeat.DataBind();
                    lblGrid.Text = String.Empty;
                }
                else
                {
                    GridRepeat.Visible = false;
                    lblGrid.Text = "No Tasks Are Found";

                }
            }
        }

        [Obsolete]
        protected void GridRepeat_ItemCommand(object source, RepeaterCommandEventArgs e)
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
                            BindGrid();
                        }

                    }
                }
            }

            if (e.CommandName == "Edit")
            {
                CheckBox chk = e.Item.FindControl("chkSelect") as CheckBox;

                if (chk != null)
                {
                    chk.Enabled = true;
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

            //ClientScript.RegisterStartupScript(GetType(), "alert", "confirm('Are you sure to make the task Imcomplete...?');", true);
            if (!(chkSelect.Checked))
            {
                if (id != 0 && id > 0)
                {
                    using (DataSet ds = objTransactionBO.PushToPending(id))
                    {
                        if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                        {
                            string Status = (ds.Tables[0].Rows[0]["com"].ToString());

                            if (Status == "1")
                            {
                                BindGrid();
                            }
                        }
                    }
                }
            }
        }

        protected void GridRepeat_ItemDataBound(object sender, RepeaterItemEventArgs e)
        {

            CheckBox chk = e.Item.FindControl("chkSelect") as CheckBox;
            if (chk != null)
            {
                chk.Enabled = false;
            }
        }

        protected void ToDoList_Click(object sender, EventArgs e)
        {
            Response.Redirect("ToDoList.aspx");
        }

        protected void ViewAll_Click(object sender, EventArgs e)
        {
            Response.Redirect("GridList.aspx");
        }
    }
}