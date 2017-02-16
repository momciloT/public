using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Web.Configuration;
using System.Data;
using System.Web.UI.HtmlControls;

public partial class Admin_dodavanje : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (User.IsInRole("korisnik"))
        {
            Server.Transfer("~/Default.aspx");


        }


    }


    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {


        switch (DropDownList1.SelectedValue)
        {
            case "0": PanelProjzvod.Visible = false; PanelKorisnik.Visible = false; PanelKategorija.Visible = false;
                PanelSlika.Visible = false;
                break;
            case "1": PanelKorisnik.Visible = false;
                PanelProjzvod.Visible = false;
                PanelKategorija.Visible = true;
                PanelSlika.Visible = false;
                break;
            case "2": PanelKorisnik.Visible = false;
                PanelProjzvod.Visible = true;
                PanelKategorija.Visible = false;
                PanelSlika.Visible = false;
                break;
            case "3": PanelKorisnik.Visible = true;
                PanelProjzvod.Visible = false;
                PanelKategorija.Visible = false;
                PanelSlika.Visible = false;
                break;
            case "4": PanelKorisnik.Visible = false;
                PanelProjzvod.Visible = false;
                PanelKategorija.Visible = false;
                PanelSlika.Visible = true;
                break;
            default: break;
        }




    }

    protected void ButtonUnesiP_Click(object sender, EventArgs e)
    {
        if (this.IsValid)
        {


            string direktorijum = Server.MapPath("~/images/");
            if (FileUploadSlikaP.HasFile)
            {
                string naziv = TextBoxNazivP.Text.ToString();
                string opis = TextBoxOpis.Text.ToString();
                string cena = TextBoxCena.Text.ToString();
                int akcija;

                if (CheckBoxAkcija.Checked) { akcija = 1; } else { akcija = 0; }
                int kategorija = Int32.Parse(DropDownListKategorija.SelectedValue);
                string novoIme = string.Format("{0}_{1}", DateTime.Now.ToString("ddMMyyyyHmm"), FileUploadSlikaP.PostedFile.FileName);
                string tip = FileUploadSlikaP.PostedFile.ContentType;
                int velicina = FileUploadSlikaP.PostedFile.ContentLength;
                DateTime datumPostavljanja = DateTime.Now;
                try
                {
                    FileUploadSlikaP.SaveAs(direktorijum + novoIme);
                    SqlConnection veza = new SqlConnection();
                    veza.ConnectionString = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ToString();

                    SqlCommand komanda = new SqlCommand();
                    komanda.CommandType = CommandType.Text;
                    komanda.CommandText = "INSERT INTO dbo.Projzvodi(id_kategorije,naziv,cena,opis,slika,akcija) VALUES(@id_kategorije,@naziv,@cena,@opis,@slika,@akcija)";

                    komanda.Connection = veza;
                    komanda.Parameters.AddWithValue("@id_kategorije", kategorija);
                    komanda.Parameters.AddWithValue("@naziv", naziv);
                    komanda.Parameters.AddWithValue("@cena", cena);
                    komanda.Parameters.AddWithValue("@opis", opis);
                    komanda.Parameters.AddWithValue("@slika", novoIme);
                    komanda.Parameters.AddWithValue("@akcija", akcija);


                    veza.Open();
                    int brojRedova = komanda.ExecuteNonQuery();
                    veza.Close();

                }
                catch (Exception ex)
                {
                    Response.Write(ex);
                }
            }
        }


    }
    protected void ButtonUnesiK_Click(object sender, EventArgs e)
    {
        if (this.IsValid)
        {


            string direktorijum = Server.MapPath("~/images/");
            if (FileUploadSlikaK.HasFile)
            {
                string naziv = TextBoxNazivK.Text.ToString();
                string novoIme = string.Format("{0}_{1}", DateTime.Now.ToString("ddMMyyyyHmm"), FileUploadSlikaK.PostedFile.FileName);
                string tip = FileUploadSlikaK.PostedFile.ContentType;
                int velicina = FileUploadSlikaK.PostedFile.ContentLength;
                DateTime datumPostavljanja = DateTime.Now;
                try
                {
                    FileUploadSlikaK.SaveAs(direktorijum + novoIme);
                    SqlConnection veza = new SqlConnection();
                    veza.ConnectionString = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ToString();

                    SqlCommand komanda = new SqlCommand();
                    komanda.CommandType = CommandType.Text;
                    komanda.CommandText = "INSERT INTO dbo.kategorija(naziv,putanja) VALUES(@naziv,@putanja)";

                    komanda.Connection = veza;
                    komanda.Parameters.AddWithValue("@naziv", naziv);
                    komanda.Parameters.AddWithValue("@putanja", novoIme);

                    veza.Open();
                    int brojRedova = komanda.ExecuteNonQuery();
                    veza.Close();

                }
                catch (Exception ex)
                {
                    Response.Write(ex);
                }
            }



        }

    }




    protected void Button1_Click(object sender, EventArgs e)
    {
        if (this.IsValid)
        {


            string direktorijum = Server.MapPath("~/images/");
            if (FileUploadslika.HasFile)
            {
                string naziv = TextBoxSlika.Text.ToString();
                string novoIme = string.Format("{0}_{1}", DateTime.Now.ToString("ddMMyyyyHmm"), FileUploadslika.PostedFile.FileName);
                string tip = FileUploadslika.PostedFile.ContentType;
                int velicina = FileUploadslika.PostedFile.ContentLength;
                DateTime datumPostavljanja = DateTime.Now;
                try
                {
                    FileUploadslika.SaveAs(direktorijum + novoIme);
                    SqlConnection veza = new SqlConnection();
                    veza.ConnectionString = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ToString();

                    SqlCommand komanda = new SqlCommand();
                    komanda.CommandType = CommandType.Text;
                    komanda.CommandText = "INSERT INTO dbo.Galerija(putanja,opis) VALUES(@putanja,@opis)";

                    komanda.Connection = veza;
                    komanda.Parameters.Add("@putanja", novoIme);
                    komanda.Parameters.Add("@opis", naziv);

                    veza.Open();
                    int brojRedova = komanda.ExecuteNonQuery();
                    veza.Close();

                }
                catch (Exception ex)
                {
                    Response.Write(ex);
                }

            }
        }
    }

   
   
}
