using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DAL
{
    public class LoginDAO
    {
        private SqlConnection objSqlConnection;

        [Obsolete]
        public LoginDAO()
        {
            objSqlConnection = null;
            objSqlConnection = new SqlConnection(System.Configuration.ConfigurationSettings.AppSettings["SQLConnectionString"]);

        }

        public DataSet SaveRegister(string status, string Name, string Email, string Password)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("RegisterDetails", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@Action", status);
            cmd.Parameters.AddWithValue("@Name", Name);

            cmd.Parameters.AddWithValue("@Email", Email);
            cmd.Parameters.AddWithValue("@Password", Password);

            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }

        public DataSet CheckUserCredential(string strLoginID, string pwd)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("CheckEmployeeCredential", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@LoginID", strLoginID);
            cmd.Parameters.AddWithValue("@pwd", pwd);

            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;


        }
    }
}