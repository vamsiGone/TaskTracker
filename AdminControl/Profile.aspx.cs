using BLL;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace AdminControl
{
    public partial class Profile : System.Web.UI.Page
    {

        [Obsolete]
        TransactionBO objTransactionBO = new TransactionBO();
        public static string ImageUrl="";
        public string ImageName;
        public string Name = "";
        public string currentUser = "";
        public string PhotoUrl = "";

        public string NoOfTasks = "";
        public string NoOfEvents = "";
        public string NoOfUsers="";
        public string pwd = "";


        [Obsolete]
        protected void Page_Load(object sender, EventArgs e)
        {
            Name = Session["Name"] as string;
            currentUser = Session["CurrentUser"] as string;
            PhotoUrl = Session["PhotoUrl"] as string;

            pwd = Session["pwd"] as string;

            if (currentUser == "" || currentUser == null)
            {
                Response.Redirect("~/Login.aspx");
            }
            if (!IsPostBack)
            {
                ImageUpdate();
                UsersDataBind();
                CountUpdate();
            }
            CountUpdate();
        }

        [Obsolete]
        protected void UsersDataBind()
        {
            using (DataSet datagrid = objTransactionBO.UsersData("Admin", currentUser))
            {
                if (datagrid != null && datagrid.Tables.Count > 0 && datagrid.Tables[0].Rows.Count > 0)
                {
                    UsersRepeater.Visible = true;
                    UsersRepeater.DataSource = datagrid;
                    UsersRepeater.DataBind();
                    lblUser.Text = String.Empty;
                    ImageUpdate();
                }
                else
                {
                    UsersRepeater.Visible = false;
                    lblUser.Text = "No Users Are Found";

                }
            }
        }

        [Obsolete]
        protected void btnUpload_Click(object sender, EventArgs e)
        {
            try
            {
                string FileName;

                string ImagePath = Convert.ToString(ConfigurationManager.AppSettings["ImageUploadPath"]);
                string DirPath = Server.MapPath(ImagePath);

                FileName = Path.GetFileName(FileUpload1.PostedFile.FileName);

                Session["PhotoUrl"] = FileName;

                ImageUpdate();

                using (DataSet ds = objTransactionBO.ImageUpload(FileName, Convert.ToString(Session["currentUser"])))
                {
                    if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                    {
                        string StrError = (ds.Tables[0].Rows[0]["com"].ToString());
                        if (StrError == "1")
                        {
                            if ((DirPath.Trim() != null) && (DirPath.Trim() != string.Empty))
                            {
                                DirectoryInfo ImageFolder = Directory.CreateDirectory(DirPath);
                                if (!(ImageFolder.Exists))
                                    ImageFolder.Create();
                            }
                            string path = string.Concat(DirPath + "\\" + FileName);

                            FileUpload1.PostedFile.SaveAs(path);

                            Session["PhotoUrl"] = FileName;

                            ImageUpdate();

                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Image Uploaded Successfully')});", true);
                            return;

                        }
                        else
                        {
                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Image Upload Failed ')});", true);
                            return;
                        }
                    }
                }



            }

            catch (Exception ex)
            {
                string exceptionMessage = ex.Message;
                string script = "$(function(){AlertMessage('error', 'Error Uploading Image : " + exceptionMessage + "');});";
                ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", script, true);
                return;
            }
        }

        [Obsolete]
        protected void CountUpdate()
        {
            if (currentUser != null && currentUser != "")
            {
                using (DataSet datagrid = objTransactionBO.UsersData("AdminProfile", currentUser))
                {
                    if (datagrid != null && datagrid.Tables.Count > 0)
                    {
                        NoOfEvents = (datagrid.Tables[0].Rows[0]["NoOfEvents"].ToString());
                        NoOfUsers = (datagrid.Tables[2].Rows[0]["NoOfUsers"].ToString());
                        NoOfTasks = (datagrid.Tables[1].Rows[0]["NoOfTasks"].ToString());
                    }
                }
            }
        }


        protected void ImageUpdate()
        {

            if (currentUser != null && currentUser != "")
            {
                ImageName = Session["PhotoUrl"] as string;
                ImageUrl = string.Concat("..\\Images\\UserImages\\" + ImageName);
            }
            else
            {
                ImageUrl = "..\\Images\\user.png";
            }

        }

        protected void RemovePic_Click(object sender, EventArgs e)
        {
            ImageUrl = "..\\Images\\user.png";

        }

        [Obsolete]
        protected void UsersRepeater_ItemCommand(object source, RepeaterCommandEventArgs e)
        {
            if (e.CommandName == "Delete")
            {
                string user = Convert.ToString(e.CommandArgument);

                using (DataSet ds = objTransactionBO.DeleteUser(user))
                {
                    if (ds != null && ds.Tables.Count > 0 && ds.Tables[0].Rows.Count > 0)
                    {
                        string Status = (ds.Tables[0].Rows[0]["com"].ToString());

                        if (Status == "1")
                        {
                            UsersDataBind();

                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('error','User Deleted')});", true);
                        }

                    }
                }
            }

            if (e.CommandName == "ViewUser")
            {
                string user = Convert.ToString(e.CommandArgument);
                using (DataSet datagrid = objTransactionBO.UsersData("QueryString", user))
                {
                    if (datagrid != null && datagrid.Tables.Count > 0 && datagrid.Tables[0].Rows.Count > 0)
                    {
                        string LogUser= (datagrid.Tables[1].Rows[0]["com"].ToString());
                        string pwd= (datagrid.Tables[0].Rows[0]["Password"].ToString());

                        if (LogUser== "1")
                        {
                            string url = Convert.ToString(ConfigurationManager.AppSettings["AppUrl"])+"Login.aspx?Name=" + Name + "&sessionMail=" + currentUser + "&currentUser=" + user + "&pwd=" + pwd;
                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){window.open('" + url + "', '_blank');});", true);
                            //Response.Redirect("~/Login.aspx?Name=" + Name + "&sessionMail=" + currentUser + "&currentUser=" + user + "&pwd=" + pwd);
                        }

                    }

                }
            }
        }       
    }
}

