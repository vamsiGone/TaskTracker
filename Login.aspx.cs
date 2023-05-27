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
                using (DataSet ds = objLoginBO.CheckUserCredential(Email, Password))
                {
                    if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                    {
                        string Redirect = (ds.Tables[0].Rows[0]["Redirect"].ToString());

                        if (Redirect == "1")
                        {
                            string Name = (ds.Tables[1].Rows[0]["Name"].ToString());
                            string Email1 = (ds.Tables[1].Rows[0]["Email"].ToString());
                            string pwd = (ds.Tables[1].Rows[0]["Password"].ToString());
                          
                            string PhotoUrl = (ds.Tables[1].Rows[0]["PhotoUrl"].ToString());
                            string TasksCreated = (ds.Tables[1].Rows[0]["TasksCreated"].ToString());
                            string TasksCompleted = (ds.Tables[1].Rows[0]["TasksCompleted"].ToString());
                            //string ImageUrl = (ds.Tables[1].Rows[0]["ImageUrl"].ToString());


                            Session["Name"] = Name;
                            Session["CurrentUser"] = Email1;
                            Session["pwd"] = pwd;
                      
                            Session["PhotoUrl"] = PhotoUrl;
                            Session["TasksCreated"] = TasksCreated;
                            Session["TasksCompleted"] = TasksCompleted;
                            Session["ImageName"] = PhotoUrl;

                            txtEmail.Text = String.Empty;
                            txtPassword.Text = String.Empty;

                            if (Name == "Admin" && Email == "vamsi@admin.com")
                            {
                                Response.Redirect("AdminControl/Dashboard.aspx");
                            }
                            else
                            {
                                Response.Redirect("ToDoList.aspx");
                            }

                        }
                        else
                        {
                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Invalid Email / Password')});", true);
                            return;
                        }

                    }
                }
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Account Not Found, Please Register')});", true);
                return;
            }
        }


        protected void Register_Button_Click(object sender, EventArgs e)
        {
            Response.Redirect("Register.aspx");
        }
    }
}
