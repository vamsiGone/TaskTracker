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
    public partial class Login : System.Web.UI.Page
    {
        [Obsolete]
        LoginBO objLoginBO = new LoginBO();
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        [Obsolete]
        protected void Login_Button_Click(object sender, EventArgs e)
        {
            string Email, Password;

            Email = txtEmail.Text.Trim();
            Password = txtPassword.Text.Trim();

            if (Email == "" && Password == "")
            {
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Email & Password must be Filled')});", true);
                return;
            }

            if (Email == "")
            {
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Email Should not be Empty')});", true);
                return;

            }
            else if (Password == "")
            {
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Password Should not be Empty')});", true);
                return;
            }
            else
            {
                using (DataSet ds = objLoginBO.CheckUserCredential(Email))
                {
                    if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                    {
                        string email1 = (ds.Tables[0].Rows[0]["Email"].ToString());
                        string pwd = (ds.Tables[0].Rows[0]["Password"].ToString());

                        if (email1 == "Vamsi@admin.com" && pwd == "Admin@123")
                        {
                            Session["CurrentUser"] = Email;
                            txtEmail.Text = String.Empty;
                            txtPassword.Text = String.Empty;
                            Response.Redirect("Admin.aspx");
                        }

                        if (email1 == Email && Password == pwd)
                        {
                            Session["CurrentUser"] = Email;
                            txtEmail.Text = String.Empty;
                            txtPassword.Text = String.Empty;
                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','User Logged In')});", true);

                            Response.Redirect("ToDoList.aspx");

                        }
                        else if (email1 == Email && Password != pwd)
                        {
                            txtPassword.Text = "";
                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Invalid Password')});", true);
                            return;
                        }
                        else
                        {
                            txtEmail.Text = "";
                            txtPassword.Text = "";
                        }
                    }
                    ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Please Register and try again')});", true);
                    return;
                }
            }
        }

        protected void Register_Button_Click(object sender, EventArgs e)
        {
            Response.Redirect("Register.aspx");
        }
    }
}