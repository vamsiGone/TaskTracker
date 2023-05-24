using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Net.Mail;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using BLL;

namespace TaskTracker
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

            CurrentPwd.Text = pwd;
            CurrentUserMail.Text = currentUser;

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

                if (currentpwd != pwd)
                {
                    ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Incorrect Password..!')});", true);
                    return;
                }

                string PassText = password2.Text.Trim();
                using (DataSet datagrid = objTransactionBO.PwdChange(currentUser, PassText))
                {
                    if (datagrid != null && datagrid.Tables.Count > 0 && datagrid.Tables[0].Rows.Count > 0)
                    {
                        string Status = (datagrid.Tables[0].Rows[0]["com"].ToString());

                        if (Status == "1")
                        {
                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Password Changed..!')});", true);

                            string ToMail = currentUser;
                            string Subject = "Change Password";
                            string Body = "<h2>Dear " + Name + ",</h2><br/><br/><p>You had Requested for password change.<br/> If not please make sure that your " +
                                 "account was safe.</p><br/><br/><h3>Your New Password: " + PassText + "</h3><br/><br/><p>Thanks & Regards,<br/><br/>Task Tracker Team.</p>";

                            bool flag = SendMail(ToMail, Subject, Body);
                            if (flag)
                            {
                                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Email Sent Successfully!')});", true);

                            }
                            password1.Text = String.Empty;
                            password2.Text = String.Empty;
                            Password.Text = String.Empty;
                            return;
                        }
                    }
                }
                password1.Text = String.Empty;
                password2.Text = String.Empty;
                Password.Text = String.Empty;

            }
        }

        protected bool SendMail( string ToMail,string Subject, string MailBody)
        {
            try
            {
                MailMessage mailMessage = new MailMessage();
                mailMessage.From = new MailAddress(ConfigurationManager.AppSettings["LocalEmailAddress"]);
                mailMessage.IsBodyHtml = true;
                mailMessage.To.Add(new MailAddress(ToMail));
                mailMessage.Subject = Subject;
                mailMessage.Body = MailBody;

                // try to add the app password due to security issues google doesnt allow normal mail id and password
                SmtpClient smtp = new SmtpClient();
                smtp.Host = ConfigurationManager.AppSettings["Host"];
                smtp.EnableSsl = Convert.ToBoolean(ConfigurationManager.AppSettings["EnableSsl"]);
                System.Net.NetworkCredential NetworkCred = new System.Net.NetworkCredential();
                NetworkCred.UserName = ConfigurationManager.AppSettings["LocalEmailAddress"];
                NetworkCred.Password = ConfigurationManager.AppSettings["Password"];
                smtp.UseDefaultCredentials = true;
                smtp.Credentials = NetworkCred;
                smtp.Port = int.Parse(ConfigurationManager.AppSettings["Port"]);

                smtp.Send(mailMessage);


                // Display success message or perform other actions
                return true;
            }
            catch (Exception ex)
            {
                // Handle any exceptions that occurred during sending
                string exceptionMessage = ex.Message;
                string script = "$(function(){AlertMessage('error', 'Error sending email: " + exceptionMessage + "');});";
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", script, true);

                return false;

            }
        }

        protected void ForgotMail_Click(object sender, EventArgs e)
        {
            string ToMail = EmailEnter.Text.Trim();
            string Subject = "Forgot Password";
            string Body = "<h2>Dear " + Name + ",</h2><br/><br/><p>You had Requested for forgot password.<br/> If not please make sure that your " +
                 "account was safe.</p><br/><br/><h3>Your Current Password: " + pwd + "</h3><br/><br/><p>Thanks & Regards,<br/><br/>Task Tracker Team.</p>";
            
            bool flag = SendMail(ToMail, Subject, Body);
            if(flag)
            {
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Email Sent Successfully!')});", true);

            }
        }  
    }
}