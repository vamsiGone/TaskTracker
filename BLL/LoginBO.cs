using DAL;
using System.Data;

namespace BLL
{
    public class LoginBO
    {
        LoginDAO objLoginDAO;
        public LoginBO()
        {
            objLoginDAO = new LoginDAO();
        }

        public DataSet SaveRegister(string status, string Fname, string Email, string Password)
        {
            DataSet objDataSet;
            objDataSet = objLoginDAO.SaveRegister(status, Fname, Email, Password);
            return objDataSet;
        }

        public DataSet CheckUserCredential(string strLoginID)
        {
            DataSet objDataSet;
            objDataSet = objLoginDAO.CheckUserCredential(strLoginID);
            return objDataSet;
        }


    }
}