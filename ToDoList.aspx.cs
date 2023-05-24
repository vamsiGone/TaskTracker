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
    public partial class ToDoList : System.Web.UI.Page
    {

        public string currentUser = "";
        public string DateIn = "";
        [Obsolete]
        TransactionBO objTransactionBO = new TransactionBO();

        [Obsolete]
        protected void Page_Load(object sender, EventArgs e)
        {
            Session["Title"] = "Pending";
            currentUser = Session["CurrentUser"] as string;
            DateIn = DateInput.Text;

            if (currentUser == null || currentUser == String.Empty || currentUser == "")
            {
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('info','Please Login First')});", false);

                Response.Redirect("Login.aspx");
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
        protected void Add_Button_Click(object sender, EventArgs e)
        {
            string text = txtTask.Text;
            string mode = Add_Button.Text;

            if (mode == "Add")
            {
                if (text != null && text != "" && text != String.Empty)
                {

                    using (DataSet ds = objTransactionBO.AddTask(text, currentUser))
                    {
                        if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                        {
                            string Status = (ds.Tables[0].Rows[0]["com"].ToString());

                            if (Status == "1")
                            {
                                txtTask.Text = String.Empty;

                                BindGrid();
                            }
                            txtTask.Text = String.Empty;

                        }
                    }

                }
            }
            else
            {
                if (text != null && text != "" && text != String.Empty)
                {
                    int id = 0;
                    if (ViewState["id"] != null)
                    {
                        id = Convert.ToInt32(ViewState["id"]);
                    }

                    using (DataSet ds = objTransactionBO.SaveTask(text, id))
                    {
                        if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                        {
                            string Status = (ds.Tables[0].Rows[0]["com"].ToString());

                            if (Status == "1")
                            {
                                txtTask.Text = String.Empty;

                                BindGrid();
                            }
                            txtTask.Text = String.Empty;

                        }
                    }
                    Add_Button.Text = "Add";

                }
            }
        }

        [Obsolete]
        protected void BindGrid()
        {
            using (DataSet datagrid = objTransactionBO.Fetch_Order("Pending", DateIn, currentUser))
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
                Add_Button.Text = "Save";
                txtTask.Text = String.Empty;

                int id = Convert.ToInt32(e.CommandArgument);
                ViewState["id"] = id;

                using (DataSet datagrid = objTransactionBO.EditTask(id))
                {
                    if (datagrid != null && datagrid.Tables.Count > 0 && datagrid.Tables[0].Rows.Count > 0)
                    {
                        txtTask.Text = datagrid.Tables[0].Rows[0]["Task"].ToString();
                    }
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

            if (chkSelect.Checked)
            {
                if (id != 0 && id > 0)
                {
                    using (DataSet ds = objTransactionBO.TaskCompletedOn(id))
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



        protected void Task_History_Click(object sender, EventArgs e)
        {
            Response.Redirect("Tasks_History.aspx");
        }

        protected void ViewAll_Click(object sender, EventArgs e)
        {
            Response.Redirect("GridList.aspx");
        }
    }
}