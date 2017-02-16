using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.Configuration;
using System.Data.SqlClient;
using System.Data;

public partial class kategorije : System.Web.UI.Page
{
   
    protected void Page_Load(object sender, EventArgs e)
    {
       string podaci = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ConnectionString;
       SqlConnection konekcija = new SqlConnection(podaci);
       SqlDataAdapter adapterN = new SqlDataAdapter("select * from kategorija", konekcija);
       DataSet skup_podataka = new DataSet();
       adapterN.Fill(skup_podataka, "PodaciKAT");
       string pocetak_tabele = "<table>";
       PlaceHolder1.Controls.Add(new LiteralControl(pocetak_tabele));
         PlaceHolder1.Controls.Add(new LiteralControl("<tr>"));
       int a = 0;
       foreach (DataRow red in skup_podataka.Tables["PodaciKAT"].Rows)
       {
           if (a == 3)
           {
            PlaceHolder1.Controls.Add(new LiteralControl("</tr><tr>"));
           }


           PlaceHolder1.Controls.Add(new LiteralControl(" <td><a href='projzvod.aspx?idk=" + red[0].ToString() + "' >" + red[1].ToString() + "</br><img  height='190px' width='160' src='images/" + red[2].ToString() + "'/></a></td>"));

           
           a++;


       }
         PlaceHolder1.Controls.Add(new LiteralControl("</tr></table>"));
        
    }
}