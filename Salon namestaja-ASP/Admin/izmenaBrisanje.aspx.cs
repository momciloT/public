using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Admin_izmenaBrisanje : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {

        switch (DropDownList1.SelectedValue)
        {
            case "1": PanelKategorija.Visible = false;
                PanelProjzvod.Visible = true;
                PanelSlika.Visible = false;
                break;
            case "2": PanelKategorija.Visible = true;
                PanelProjzvod.Visible = false;
                PanelSlika.Visible = false;
                break;
            case "3": PanelKategorija.Visible = false;
                PanelProjzvod.Visible = false;
                PanelSlika.Visible = true;
                break;
            default: PanelKategorija.Visible = false;
                PanelProjzvod.Visible = false;
                PanelSlika.Visible = false; break;

        }
    }
}