using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.Configuration;
using System.Data.SqlClient;
using System.Data;

public partial class Default2 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string podaci = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ConnectionString;
        SqlConnection konekcija = new SqlConnection(podaci);
        SqlDataAdapter adapterN = new SqlDataAdapter("select * from anketa", konekcija);
        DataSet skup_podataka = new DataSet();
        adapterN.Fill(skup_podataka, "PodaciProj");
        foreach (DataRow red in skup_podataka.Tables["PodaciProj"].Rows)
        {

            PanelRezulatatA.Controls.Add(new LiteralControl("<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" + red[1].ToString() + "*********" + red[2].ToString() + "</p></br>"));



        }

    }
}