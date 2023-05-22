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
    public partial class Register : System.Web.UI.Page
    {

        LoginBO objLoginBO = new LoginBO();
        protected void Page_Load(object sender, EventArgs e)
        {

        }
        protected void Register_Button_Click(object sender, EventArgs e)
        {
            string Name, Email, Password, CnfPwd;
            Name = txtUsername.Text.Trim();
            Email = txtEmail.Text.Trim();
            Password = txtPassword.Text.Trim();
            CnfPwd = txtConfirmPassword.Text.Trim();

            if (Email == "")
            {
                return;
            }
            if (Password != CnfPwd)
            {
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error',' Password & Confirm Password must be same')});", true);
                return;
            }
            else
            {
                using (DataSet ds = objLoginBO.SaveRegister("Check", Name, Email, Password))
                {
                    if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                    {
                        string Status = (ds.Tables[0].Rows[0]["com"].ToString());
                        if (Status == "0")
                        {
                            using (DataSet dts = objLoginBO.SaveRegister("Insert", Name, Email, Password))
                            {
                                if (dts != null && dts.Tables.Count > 0 && dts.Tables[0].Rows.Count > 0)
                                {
                                    string Statusin = (dts.Tables[0].Rows[0]["com"].ToString());

                                    if (Statusin == "1")
                                    {
                                        txtUsername.Text = String.Empty;
                                        txtEmail.Text = String.Empty;
                                        txtPassword.Text = String.Empty;
                                        txtConfirmPassword.Text = String.Empty;
                                        ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Registered Successfully')});", true);
                                        return;
                                    }
                                    else
                                    {
                                        txtUsername.Text = "";
                                        txtEmail.Text = "";
                                        txtPassword.Text = "";
                                        txtConfirmPassword.Text = "";
                                        ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Something Wrong., Please try again.!')});", true);
                                        return;
                                    }
                                }
                            }
                        }
                        else
                        {
                            txtEmail.Text = "";
                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('warning','Email Already Exists')});", true);
                            return;
                        }
                    }
                }
            }
        }



        protected void Login_Button_Click(object sender, EventArgs e)
        {
            Response.Redirect("Login.aspx");
        }
    }
}
