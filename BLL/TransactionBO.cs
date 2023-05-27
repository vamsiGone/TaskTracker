using System;
using System.Collections.Generic;
using System.Data;
using System.Globalization;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using DAL;

namespace BLL
{
    public class TransactionBO
    {
        private TransactionDAO objTransactionDAO;

        [Obsolete]
        public TransactionBO()
        {
            objTransactionDAO = new TransactionDAO();
        }
        public DataSet AddTask(string Text, string currentUser)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.AddTask(Text, currentUser);
            return objDataSet;
        }
        public DataSet SaveTask(string Text, int id)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.SaveTask(Text, id);
            return objDataSet;
        }

        public DataSet EditTask(int id)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.EditTask(id);
            return objDataSet;
        }
        public DataSet DeleteTask(int id)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.DeleteTask(id);
            return objDataSet;
        }
        public DataSet TaskCompletedOn(int id)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.TaskCompletedOn(id);
            return objDataSet;
        }
        public DataSet PushToPending(int id)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.PushToPending(id);
            return objDataSet;
        }
        public DataSet Fetch_Order(string status, string dateIn, string user)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.Fetch_Order(status, dateIn, user);
            return objDataSet;
        }
        public DataTable FetchAll(string title, string user)
        {
            DataTable dt;
            dt = objTransactionDAO.FetchAll(title, user);
            return dt;
        }
        public DataSet PwdChange(string user, string pwd)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.PwdChange(user, pwd);
            return objDataSet;
        }
        public DataSet ImageUpload(string Path, string user)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.ImageUpload(Path,user);
            return objDataSet;
        }

        public DataSet GetImagePath(string user)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.GetImagePath(user);
            return objDataSet;
        }
        public DataSet UsersData(string action, string user)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.UsersData(action,user);
            return objDataSet;
        }
        public DataSet DeleteUser(string user)
        {
            DataSet objDataSet;
            objDataSet = objTransactionDAO.DeleteUser(user);
            return objDataSet;
        }


    }
}