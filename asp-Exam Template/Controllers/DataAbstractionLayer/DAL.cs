using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using lab8.Models;
using MySql.Data.MySqlClient;
using System.Data.SqlClient;
using System.Data;


namespace lab8.DataAbstractionLayer
{
    public class DAL
    {
        public static User currentUser;

        public void setUser( User user)
        {
            currentUser = user;
        }

        public bool register(string name, string password)
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            try
            {


                conn.Open();
                string query = "insert into users(name,password) values(@name,@pw)";

                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@name", name);
                cmd.Parameters.AddWithValue("@pw", password);

                int rows = cmd.ExecuteNonQuery();


                return rows > 0;


            }
            catch (MySql.Data.MySqlClient.MySqlException ex)
            {
                System.Diagnostics.Debug.WriteLine(ex.ToString());
            }

            return false;

        }



        public bool login(string name,string password)
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            try
            {

                conn.Open();
                string query = "SELECT * FROM users where name=@name and password=@pw ";

                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@name", name);
                cmd.Parameters.AddWithValue("@pw", password);
                
                SqlDataReader myreader = cmd.ExecuteReader();

                myreader.Read();

                User newUser = new User();
                newUser.Id = Convert.ToInt32(myreader["id"]);
                newUser.name = myreader["name"].ToString();
                newUser.password = myreader["password"].ToString();

                this.setUser(newUser);


                return myreader[0] != null;

                
            }
            catch (MySql.Data.MySqlClient.MySqlException ex)
            {
                System.Diagnostics.Debug.WriteLine(ex.ToString());
            }

            return false;

        }



        public List<Asset> getAssets()
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            List<Asset> rlist = new List<Asset>();


            try
            {

                conn.Open();

                string query = "SELECT * FROM assets where userid=@uid ";

                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@uid", currentUser.Id);
                SqlDataReader myreader = cmd.ExecuteReader();



                while (myreader.Read())
                {
                    Asset recepie = new Asset();
                    recepie.Id = Convert.ToInt32(myreader["aid"]);
                    recepie.Name = myreader["name"].ToString();
                    recepie.Description = myreader["description"].ToString();
                    recepie.Value = Convert.ToInt32(myreader["value"]);
                    rlist.Add(recepie);
                }

                myreader.Close();
                conn.Close();

            }
            catch (MySql.Data.MySqlClient.MySqlException ex)
            {
                System.Diagnostics.Debug.WriteLine(ex.ToString());
            }

            return rlist;
        }


        public void addAsset(AssetDto asset)
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            try
            {
                conn.Open();
                string query = "insert into assets(userid,name,description,value) values(@id,@name,@desc,@value)";

                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@id", currentUser.Id);
                cmd.Parameters.AddWithValue("@name", asset.Name);
                cmd.Parameters.AddWithValue("@desc", asset.Description);
                cmd.Parameters.AddWithValue("@value",asset.Value);

                //cmd.ExecuteNonQuery();
                SqlDataReader myreader = cmd.ExecuteReader();
                conn.Close();
            }
            catch (SqlException ex) { 
            
                Console.WriteLine("DAMN");
                System.Diagnostics.Debug.WriteLine(ex.ToString());
            }

        }



        public void updateAsset(int id, string name, string desc, int value)
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            try
            {
                conn.Open();
                string query = "update assets set name=@name,description=@desc,value=@value where aid=@id and userid=@uId";

                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@id", id);
                cmd.Parameters.AddWithValue("@name", name);
                cmd.Parameters.AddWithValue("@desc", desc);
                cmd.Parameters.AddWithValue("@value", value);
                cmd.Parameters.AddWithValue("@uId", currentUser.Id);

                cmd.ExecuteNonQuery();

                conn.Close();
            }
            catch (SqlException ex)
            {
                Console.WriteLine("DAMN");
                System.Diagnostics.Debug.WriteLine(ex.ToString());
            }


        }

        public void delete(int id)
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            try
            {

                conn.Open();
                string query = "delete from assets where aid=@id ";

                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@id", id);
                
                cmd.ExecuteNonQuery();

                conn.Close();

            }
            catch (SqlException ex)
            {
                System.Diagnostics.Debug.WriteLine(ex.ToString());
            }
        }

    }
}