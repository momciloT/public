using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.Configuration;
using System.Data.SqlClient;
using System.Data;

public partial class galerija : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string podaci = WebConfigurationManager.ConnectionStrings["VezaSaBazom"].ConnectionString;
        SqlConnection konekcija = new SqlConnection(podaci);
        SqlDataAdapter adapterN = new SqlDataAdapter("select * from Galerija", konekcija);
        DataSet skup_podataka = new DataSet();
       
         adapterN.Fill(skup_podataka, "PodaciGal");
         foreach (DataRow red in skup_podataka.Tables["PodaciGal"].Rows)
         {
             ImageButton IB = new ImageButton();
             IB.ImageUrl="~/images/"+red[1].ToString();
             IB.Width = Unit.Pixel(190);
             IB.Height = Unit.Pixel(190);
             IB.Style.Add("padding","5px");
             IB.Click += new ImageClickEventHandler(IB_Click);
             Panel1.Controls.Add(IB);



         }



       

    }

    void IB_Click(object sender, ImageClickEventArgs e)
    {
        Response.Redirect("~/prikaz.aspx?ss=" + ((ImageButton)sender).ImageUrl);
    }


}