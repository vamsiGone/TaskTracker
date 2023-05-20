using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
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

        public string currentUser = "";
        protected void Page_Load(object sender, EventArgs e)
        {
            currentUser = Session["CurrentUser"] as string;
        }

        protected void Logout_Click(object sender, EventArgs e)
        {
            Session["currentUser"] = "";
            Response.Redirect("Login.aspx");
        }

        //[Obsolete]
        //protected void Changepwd_Click(object sender, EventArgs e)
        //{
        //    if (currentUser == "" || currentUser == null)
        //    {
        //        ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','First Sign in, Try Again')});", true);
        //        return;
        //    }
        //    else
        //    {
        //        string PassText = password2.Text.Trim();
        //        using (DataSet datagrid = objTransactionBO.PwdChange(currentUser, PassText))
        //        {
        //            if (datagrid != null && datagrid.Tables.Count > 0 && datagrid.Tables[0].Rows.Count > 0)
        //            {
        //                string Status = (datagrid.Tables[0].Rows[0]["com"].ToString());

        //                if (Status == "1")
        //                {
        //                    ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Password Changed..!')});", true);
        //                    return;
        //                }
        //            }
        //        }
        //    }
        //}
    }
}