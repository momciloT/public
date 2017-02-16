using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.Configuration;
using System.Data.SqlClient;
using System.Data;

public partial class full : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string idp = Request.QueryString["idp"];
        string podaci = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ConnectionString;
        SqlConnection konekcija = new SqlConnection(podaci);
        SqlDataAdapter adapterN = new SqlDataAdapter("select * from Projzvodi where id="+idp, konekcija);
        DataSet skup_podataka = new DataSet();
        adapterN.Fill(skup_podataka, "PodaciProj");
        foreach (DataRow red in skup_podataka.Tables["PodaciProj"].Rows)
        {
            PlaceHolder1.Controls.Add(new LiteralControl("<h1>"+red[2].ToString()+" </h1></br><img height='350px' width='550' src='images/"+red[5].ToString()+"'/><p>"+red[4].ToString()+"</p></br><p>CENA:"+red[3].ToString()+"</p>"));
           


        }

    }
}