using DAL;
using System.Data;

namespace BLL
{
    public class LoginBO
    {
        LoginDAO objLoginDAO;

        [System.Obsolete]
        public LoginBO()
        {
            objLoginDAO = new LoginDAO();
        }

        public DataSet SaveRegister(string status, string Name, string Email, string Password)
        {
            DataSet objDataSet;
            objDataSet = objLoginDAO.SaveRegister(status, Name, Email, Password);
            return objDataSet;
        }

        public DataSet CheckUserCredential(string strLoginID, string pwd)
        {
            DataSet objDataSet;
            objDataSet = objLoginDAO.CheckUserCredential(strLoginID, pwd);
            return objDataSet;
        }


    }
}