using System;
using System.Collections;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Web;
using System.Web.SessionState;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls;
using System.IO;
using System.Configuration;
using System.Xml.Linq;
using BLL;

namespace TaskTracker
{
    public partial class Profile : System.Web.UI.Page
    {
        [Obsolete]
        TransactionBO objTransactionBO = new TransactionBO();
        public string ImageUrl;
        public string ImageName;
        public string Name = "";
        public string currentUser = "";
        public string PhotoUrl = "";
   
        public string TasksCreated = "0";
        public string TasksCompleted = "0";
        public string pwd = "";

        protected void Page_Load(object sender, System.EventArgs e)
        {
            Name = Session["Name"] as string;
            currentUser = Session["CurrentUser"] as string;
            PhotoUrl = Session["PhotoUrl"] as string;
         
            TasksCreated = Session["TasksCreated"] as string;
            TasksCompleted = Session["TasksCompleted"] as string;
            pwd = Session["pwd"] as string;

            ImageUpdate();          
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

                using (DataSet ds = objTransactionBO.ImageUpload( FileName, Convert.ToString(Session["currentUser"])))
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
                            ScriptManager.RegisterStartupScript(this.Page, GetType(), "AlertMessage", "$(function(){AlertMessage('success','Image Upload Failed')});", true);
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

        protected void ImageUpdate()
        {
            
                if(currentUser != null && currentUser != "")
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
    }
}