using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.Configuration;
using System.Data.SqlClient;
using System.Data;

public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
       

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlConnection konekcija1 = new SqlConnection();
        konekcija1.ConnectionString = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ToString();
        SqlCommand komanda = new SqlCommand();
        komanda.Connection = konekcija1;

        int i=Convert.ToInt16( RadioButtonList1.SelectedValue);


        if (i==1)
        {
            String tekst1 = "UPDATE anketa SET rezultat=rezultat+1 WHERE id=1";
            komanda.CommandText = tekst1;
            komanda.CommandType = CommandType.Text;
            konekcija1.Open();
            komanda.ExecuteNonQuery();
            konekcija1.Close();


            string podaci = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ConnectionString;
            SqlConnection konekcija = new SqlConnection(podaci);
            SqlDataAdapter adapterN = new SqlDataAdapter("select * from anketa", konekcija);
            DataSet skup_podataka = new DataSet();
            adapterN.Fill(skup_podataka, "PodaciProj");
            foreach (DataRow red in skup_podataka.Tables["PodaciProj"].Rows)
            {

              PanelRezulatatA.Controls.Add(new LiteralControl("<p>" + red[1].ToString() + "*********" + red[2].ToString() + "</p></br>"));



            }


            PanelAnketa.Visible = false;
            PanelRezulatatA.Visible = true;

            Server.Transfer("Defaut.aspx");

        }
        else
        {
            if (RadioButtonList1.SelectedValue.ToString()=="2")
            {
                String tekst1 = "UPDATE anketa SET rezultat=rezultat+1 WHERE id=2";
                komanda.CommandText = tekst1;
                komanda.CommandType = CommandType.Text;
                konekcija1.Open();
                komanda.ExecuteNonQuery();

                konekcija1.Close();

                string podaci = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ConnectionString;
                SqlConnection konekcija = new SqlConnection(podaci);
                SqlDataAdapter adapterN = new SqlDataAdapter("select * from anketa", konekcija);
                DataSet skup_podataka = new DataSet();
                adapterN.Fill(skup_podataka, "PodaciProj");
                foreach (DataRow red in skup_podataka.Tables["PodaciProj"].Rows)
                {

                    PanelRezulatatA.Controls.Add(new LiteralControl("<p>" + red[1].ToString() + "*********" + red[2].ToString() + "</p></br>"));



                }
                PanelAnketa.Visible = false;
                PanelRezulatatA.Visible = true;
                Server.Transfer("Defaut.aspx");
            }
            else
            {
                if ( i== 3)
                {

                    String tekst1 = "UPDATE anketa SET rezultat=rezultat+1 WHERE id=3";
                    komanda.CommandText = tekst1;
                    komanda.CommandType = CommandType.Text;
                    konekcija1.Open();
                    komanda.ExecuteNonQuery();

                    konekcija1.Close();

                    string podaci = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ConnectionString;
                    SqlConnection konekcija = new SqlConnection(podaci);
                    SqlDataAdapter adapterN = new SqlDataAdapter("select * from anketa", konekcija);
                    DataSet skup_podataka = new DataSet();
                    adapterN.Fill(skup_podataka, "PodaciProj");
                    foreach (DataRow red in skup_podataka.Tables["PodaciProj"].Rows)
                    {

                        PanelRezulatatA.Controls.Add(new LiteralControl("<p>" + red[1].ToString() + "*********" + red[2].ToString() + "</p></br>"));



                    }
                    PanelAnketa.Visible = false;
                    PanelRezulatatA.Visible = true;
                    Server.Transfer("Defaut.aspx");
                   
                }
                else
                {
                    Labelgreska.Text = "Morate izabrati odgovor!!!";


                }

                

            }
        }
    }
}