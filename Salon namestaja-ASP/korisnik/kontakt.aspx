<%@ Page Title=""  Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="kontakt.aspx.cs" Inherits="kontakt" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <script src="../js/ie6.js" type="text/javascript"></script>
    <script src="../js/shadowbox.js" type="text/javascript"></script>
    <script src="../js/jquery-1.4.min.js" type="text/javascript"></script>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/login.js" type="text/javascript"></script>
    <script src="../js/menie.js" type="text/javascript"></script>
    <script src="../js/scripts.js" type="text/javascript"></script>

</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderslajder" Runat="Server">

 <a href="">
        <img id="slide-img-1" src="../images/slajd1.jpg" class="slide" alt="" /></a>
             <a href=""><img id="slide-img-2" src="../images/slajd2.jpg" class="slide" alt="" /></a>
     <a href=""><img id="slide-img-3" src="../images/slajd3.jpg" class="slide" alt="" /></a>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderLevi" Runat="Server">
<h2>Naši parteneri:</h2>
                    <div class="vmenu"> 
                    
                          <img id="" src="../images/logo.png" alt="Metal Dimitrovgrad partneri"  />
                      
                    </div>

</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="ContentPlaceHolderGlavni" Runat="Server">
  
    <div class="grid_4">
      <h1>Kontaktirajte nas</h1>
     
    </div>
    <div class="grid_8">
      <div class="left-1">
        
        <table id="tabela">

        <tr>
            <td width="100px">
                <asp:Label ID="LabelImePrezime" runat="server" Text="Ime i prezime:" AssociatedControlID="TextBoxImePrezime"></asp:Label> 
            </td>
            <td>
                <asp:TextBox ID="TextBoxImePrezime" runat="server" CssClass="input" 
                    ValidationGroup="kontakt"></asp:TextBox> 
            </td>
            <td>
                <asp:RequiredFieldValidator ID="RequiredFieldValidatorImePrezime" 
                    runat="server" ErrorMessage="Ime i prezime je obavezno !!!" Text="*" 
                    ControlToValidate="TextBoxImePrezime" Display="Dynamic" ForeColor="red" 
                    ValidationGroup="kontakt"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="RegularExpressionValidatorImePrezime" 
                    runat="server" ErrorMessage="Ime i prezime nije u dobrom formatu !!!" Text="*" 
                    ControlToValidate="TextBoxImePrezime" ValidationExpression="^\w{3,}\s\w{3,}$" 
                    Display="Dynamic" ForeColor="red" ValidationGroup="kontakt"></asp:RegularExpressionValidator>
            
            </td>
        </tr>
        <tr>
            <td class="style1"><asp:Label ID="LabelEmail" runat="server" Text="Email adresa:" AssociatedControlID="TextBoxEmail"></asp:Label>
            </td>
            <td><asp:TextBox ID="TextBoxEmail" runat="server" CssClass="input" 
                    ValidationGroup="kontakt"></asp:TextBox> 
            </td>
            <td>
               <asp:RequiredFieldValidator ID="RequiredFieldValidatorTextBoxEmail" 
                    runat="server" ErrorMessage="Email je obavezan !!!" Text="*" 
                    ControlToValidate="TextBoxEmail" Display="Dynamic" ForeColor="red" 
                    ValidationGroup="kontakt"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="RegularExpressionValidatorTextBoxEmail" 
                    runat="server" ErrorMessage="Email nije u dobrom formatu !!!" Text="*" 
                    ControlToValidate="TextBoxEmail" 
                    ValidationExpression="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$" 
                    Display="Dynamic" ForeColor="red" ValidationGroup="kontakt"></asp:RegularExpressionValidator>
            </td>
        </tr>
        <tr>
            <td> <asp:Label ID="LabelPoruka" runat="server" Text="Poruka:" AssociatedControlID="TextBoxPoruka"></asp:Label> 
            </td>
            <td><asp:TextBox ID="TextBoxPoruka" runat="server" TextMode="MultiLine" 
                    CssClass="textarea" ValidationGroup="kontakt"></asp:TextBox>
            </td>
            <td>
                <asp:RequiredFieldValidator ID="RequiredFieldValidatorTextBoxPoruka" 
                    runat="server" ErrorMessage="Poruka je obavezna !!!" Text="*" ForeColor="red" 
                    ControlToValidate="TextBoxPoruka" Display="Dynamic" ValidationGroup="kontakt"></asp:RequiredFieldValidator>
                 <asp:CustomValidator ID="CustomValidatorTextBoxPoruka" runat="server" 
                    ErrorMessage="Morate uneti najmanje 10 karaktera !!!" Text="*" 
                    ControlToValidate="TextBoxPoruka" 
                    ClientValidationFunction="ValidacijaPoruka" Display="Dynamic" 
                    ForeColor="red" 
                    onservervalidate="CustomValidatorTextBoxPoruka_ServerValidate" 
                    ValidationGroup="kontakt"></asp:CustomValidator>  
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <asp:Button ID="Button1" runat="server" Text="Poništi" CssClass="button" onclick="Button1_Click" />
                <asp:Button ID="ButtonPosalji" runat="server" Text="Pošalji" CssClass="button" 
                    ValidationGroup="kontakt"/>
            </td> 
        </tr>
    </table>
    <asp:ValidationSummary ID="ValidationSummary" runat="server" ForeColor="red" 
              ValidationGroup="kontakt" />

       
      </div>
    </div>
    <div class="clear"></div>
  

</asp:Content>
<asp:Content ID="Content5" ContentPlaceHolderID="ContentPlaceHolderDesni1" Runat="Server">
<h2>Korpa</h2>  
						<div class="vmenu"> 
						<img src="../images/korpa.png" alt="Metal Dimitrovgarad Korpa"/>
                    </div>
</asp:Content>
<asp:Content ID="Content6" ContentPlaceHolderID="ContentPlaceHolderDesni2" Runat="Server">
</asp:Content>

