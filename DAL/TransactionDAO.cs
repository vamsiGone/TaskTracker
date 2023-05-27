using System;
using System.Collections;
using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DAL
{
    public class TransactionDAO
    {
        private SqlConnection objSqlConnection;

        [Obsolete]
        public TransactionDAO()
        {
            objSqlConnection = null;
            objSqlConnection = new SqlConnection(ConfigurationSettings.AppSettings["SQLConnectionString"].ToString());

        }
        public DataSet AddTask(string Task, string Email)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("AddTask", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@Action", "Insert");

            cmd.Parameters.AddWithValue("@Task", Task);
            cmd.Parameters.AddWithValue("@Email", Email);

            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }
        public DataSet SaveTask(string Task, int id)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("SaveTask", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@Action", "Save");

            cmd.Parameters.AddWithValue("@Task", Task);
            cmd.Parameters.AddWithValue("@id", id);
            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }

        public DataSet EditTask(int id)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("EditTask", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@Action", "Edit");
            cmd.Parameters.AddWithValue("@id", id);
            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }

        public DataSet DeleteTask(int id)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("DeleteTask", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@Action", "Delete");

            cmd.Parameters.AddWithValue("@id", id);

            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }
        public DataSet TaskCompletedOn(int id)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("TaskCompletedOn", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@Action", "Update");

            cmd.Parameters.AddWithValue("@id", id);

            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }
        public DataSet PushToPending(int id)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("PushToPending", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@Action", "PushToPend");

            cmd.Parameters.AddWithValue("@id", id);

            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }

        public DataSet Fetch_Order(string status, string dateIn, string user)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("Fetch_Order", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@Status", status);
            cmd.Parameters.AddWithValue("@dateIn", dateIn);
            cmd.Parameters.AddWithValue("@user", user);

            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }
        public DataTable FetchAll(string title, string user)
        {
            DataTable dt = new DataTable();
            SqlCommand cmd = new SqlCommand("FetchAll", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@Status", title);
            cmd.Parameters.AddWithValue("@user", user);
            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(dt);
            return dt;
        }

        public DataSet PwdChange(string user, string pwd)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("ChangePwd", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@user", user);
            cmd.Parameters.AddWithValue("@pwd", pwd);
            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }

        public DataSet ImageUpload(string Path, string user)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("ImageUpload", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;

            cmd.Parameters.AddWithValue("@Action", "Insert");
            cmd.Parameters.AddWithValue("@ImageUrl", Path);
            cmd.Parameters.AddWithValue("@User", user);
            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;
        }
        public DataSet GetImagePath(string user)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("ImageUpload", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;

            cmd.Parameters.AddWithValue("@Action", "Select");
            cmd.Parameters.AddWithValue("@email", user);
            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;

        }
        public DataSet UsersData(string action, string user)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("UsersData", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;

            cmd.Parameters.AddWithValue("@Action", action);
            cmd.Parameters.AddWithValue("@user", user);
            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;

        }
        public DataSet DeleteUser(string user)
        {
            DataSet ds = new DataSet();
            SqlCommand cmd = new SqlCommand("DeleteUser", objSqlConnection);
            cmd.CommandType = CommandType.StoredProcedure;
            cmd.Parameters.AddWithValue("@email", user);
            SqlDataAdapter sda = new SqlDataAdapter(cmd);
            sda.Fill(ds);
            return ds;

        }
    }
}