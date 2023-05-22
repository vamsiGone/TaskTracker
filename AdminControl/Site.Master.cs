using BLL;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace AdminControl
{
    public partial class SiteMaster : MasterPage
    {
        [Obsolete]
        TransactionBO objTransactionBO = new TransactionBO();

        public string Name = "";
        public string currentUser = "";
        public string PhotoUrl = "";
        public string Bio = "";
        public string TasksCreated = "0";
        public string TasksCompleted = "0";
        public string pwd = "";


        protected void Page_Load(object sender, EventArgs e)
        {
            Name = Session["Name"] as string;
            currentUser = Session["CurrentUser"] as string;
            PhotoUrl = Session["PhotoUrl"] as string;
            Bio = Session["Bio"] as string;
            TasksCreated = Session["TasksCreated"] as string;
            TasksCompleted = Session["TasksCompleted"] as string;
            pwd = Session["pwd"] as string;
        }

        protected void Logout_Click(object sender, EventArgs e)
        {
            Session["currentUser"] = "";
            Response.Redirect("Login.aspx");
        }

        [Obsolete]
        protected void Changepwd_Click(object sender, EventArgs e)
        {
            if (currentUser == "" || currentUser == null)
            {
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','First Sign in, Try Again')});", true);
                return;
            }
            else
            {
                string currentpwd = Password.Text.Trim();

                string PassText = password2.Text.Trim();
                using (DataSet datagrid = objTransactionBO.PwdChange(currentUser, PassText))
                {
                    if (datagrid != null && datagrid.Tables.Count > 0 && datagrid.Tables[0].Rows.Count > 0)
                    {
                        string Status = (datagrid.Tables[0].Rows[0]["com"].ToString());

                        if (Status == "1")
                        {
                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Password Changed..!')});", true);
                            return;
                        }
                    }
                }

            }
        }
    }
}