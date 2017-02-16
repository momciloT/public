using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class kontakt : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void CustomValidatorTextBoxPoruka_ServerValidate(object source, ServerValidateEventArgs args)
    {
        if (args.Value.Length > 10)
        {
            args.IsValid = true;
        }
        else
        {
            args.IsValid = false;
        }
    }

    protected void Button1_Click(object sender, EventArgs e)
    {
        TextBoxImePrezime.Text = "";
        TextBoxEmail.Text = "";
        TextBoxPoruka.Text = "";
    }
}