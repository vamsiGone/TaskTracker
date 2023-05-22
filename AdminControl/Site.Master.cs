using BLL;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Net.Mail;
using System.Net;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Net;
using System.Net.Mail;

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


            if (currentUser == null || currentUser == String.Empty || currentUser == "")
            {
                Response.Redirect("~/Login.aspx");
            }
        }

        protected void Logout_Click(object sender, EventArgs e)
        {
            Session["currentUser"] = "";
            Response.Redirect("~/Login.aspx");
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
                if(currentpwd != pwd)
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

                            password1.Text = String.Empty;
                            password2.Text = String.Empty;
                            Password.Text = String.Empty;
                            return;
                        }
                    }
                }
                password1.Text = String.Empty;
                password2.Text=String.Empty;
                Password.Text = String.Empty;

            }
        }

        protected void SendMail_Click(object sender, EventArgs e)
        {
            try
            {
                // Set up the SMTP client and email message
                SmtpClient smtpClient = new SmtpClient("smtp.gmail.com");
                smtpClient.Port = 587; // Use the appropriate port for your SMTP server
                smtpClient.Credentials = new NetworkCredential("vamsigone00@gmail.com", "v@1a2ms34i");

                MailMessage mailMessage = new MailMessage();
                mailMessage.From = new MailAddress("vamsigone00@gmail.com");
                mailMessage.To.Add("vamsigone001@gmail.com");
                mailMessage.Subject = "Password Change Requested";
                mailMessage.Body =  $"Dear {currentUser},\n\n"
                + "You had Request for Password change.\n\n"
                + "Your Password: " + pwd + "\n\n"
                + "Please keep this information secure and do not share it with anyone.\n\n"
                + "Thank you!\n\n"
                + "Best regards,\n"
                + "Task Tracker Team";

                // Attachments (optional)
                // mailMessage.Attachments.Add(new Attachment("file_path"));

                // Send the email
                smtpClient.Send(mailMessage);

                // Display success message or perform other actions
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Email Sent Successfully!')});", true);
                return;
            }
            catch (Exception ex)
            {
                // Handle any exceptions that occurred during sending
                string exceptionMessage = ex.Message;
                string script = "$(function(){AlertMessage('error', 'Error sending email: " + exceptionMessage + "');});";
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", script, true);



            }
        }
    }
}