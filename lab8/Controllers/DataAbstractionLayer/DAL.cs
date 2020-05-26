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
                string query = "SELECT count(*) FROM users where name=@name and password=@pw ";

                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@name", name);
                cmd.Parameters.AddWithValue("@pw", password);
                
                SqlDataReader myreader = cmd.ExecuteReader();

                myreader.Read();
          
                

                return Convert.ToInt32(myreader[0]) > 0;

                
            }
            catch (MySql.Data.MySqlClient.MySqlException ex)
            {
                System.Diagnostics.Debug.WriteLine(ex.ToString());
            }

            return false;

        }

        public List<Recepie> getAll()
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            List<Recepie> rlist = new List<Recepie>();


            try
            {

                conn.Open();
                string query = "SELECT * FROM recepies";

                SqlCommand cmd = new SqlCommand(query, conn);
                SqlDataReader myreader = cmd.ExecuteReader();


                while (myreader.Read())
                {
                    Recepie recepie = new Recepie();
                    recepie.Id = Convert.ToInt32(myreader["rId"]);
                    recepie.Title = myreader["title"].ToString();
                    recepie.Description = myreader["description"].ToString();
                    recepie.Type = myreader["type"].ToString();
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

        public void addRecepie(string title,string desc,string type)
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            try
            {
                conn.Open();
                string query = "insert into recepies(title,description,type) values(@title,@desc,@type)";

                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@title", title);
                cmd.Parameters.AddWithValue("@desc", desc);
                cmd.Parameters.AddWithValue("@type", type);

                //cmd.ExecuteNonQuery();
                SqlDataReader myreader = cmd.ExecuteReader();
                conn.Close();
            }
            catch(SqlException ex)
            {
                Console.WriteLine("DAMN");
                System.Diagnostics.Debug.WriteLine(ex.ToString());
            }

           
        }

        public void updateRecepie(int id, string title, string desc, string type)
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            try
            {
                conn.Open();
                string query = "update recepies set title=@title,description=@desc,type=@type where rId=@id";

                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@id", id);
                cmd.Parameters.AddWithValue("@title", title);
                cmd.Parameters.AddWithValue("@desc", desc);
                cmd.Parameters.AddWithValue("@type", type);

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
                string query = "delete from recepies where rId=@id ";

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

        public List<Recepie> GetRecepiesForMain(string recepieType)
        {
            string connString = "Data Source = RARES\\SQLEXPRESS ; Initial Catalog=lab8; Integrated Security = true";

            SqlConnection conn = new SqlConnection(connString);

            List<Recepie> rlist = new List<Recepie>();

            try
            {
               
                conn.Open();
                string query = "SELECT * FROM recepies where type=@givenType";
   
                SqlCommand cmd = new SqlCommand(query, conn);
                cmd.Parameters.AddWithValue("@givenType", recepieType);

                SqlDataReader myreader = cmd.ExecuteReader();


                while (myreader.Read())
                {
                    Recepie recepie = new Recepie();
                    recepie.Id = Convert.ToInt32(myreader["rId"]);
                    recepie.Title = myreader["title"].ToString();
                    recepie.Description = myreader["description"].ToString();
                    recepie.Type = myreader["type"].ToString();
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
    }
}