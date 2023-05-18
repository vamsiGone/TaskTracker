using BLL;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace TaskTracker
{
    public partial class Contact : System.Web.UI.Page
    {           
            protected void Page_Load(object sender, EventArgs e)
            {

            }

            protected void Submit_Button_Click(object sender, EventArgs e)
            {
                string Email, Name, Message;

                Email = txtEmail.Text.Trim();
                Name = txtName.Text.Trim();
                Message = txtMessage.Text.Trim();

                if (Email == "" && Name == "" && Message == "")
                {
                    ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','All fields must be filled')});", true);
                    return;

                }
                if (Email == "")
                {
                    ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Email should not be empty')});", true);
                    return;
                }
                if (Name == "")
                {
                    ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Name should not be empty')});", true);
                    return;
                }
                if (Message == "")
                {
                    ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','Message should not be empty')});", true);
                    return;
                }
                if (Email != "" && Name != "" && Message != "")
                {
                    ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('info','Your Feedback Recorded')});", true);
                    return;

                }

            }
        }
    }