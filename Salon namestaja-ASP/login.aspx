<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="login.aspx.cs" Inherits="login" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderLevi" Runat="Server">
    <h2>Naši parteneri:</h2>
                    <div class="vmenu"> 
                    
                          <img id="" src="images/logo.png" alt="Metal Dimitrovgrad partneri"  />
                      
                    </div>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderGlavni" Runat="Server">
    <asp:Login ID="Login1" runat="server" 
    FailureText="Neuspeo pokušaj autentifikacije. Molimo pokušajte ponovo" 
    PasswordLabelText="Šifra:" RememberMeText="Zapamti me" TitleText="Ulaz" 
    UserNameLabelText="Korisnicko ime:" 
        CreateUserIconUrl="~/images/services_registration1.png" 
        CreateUserText="Novi korisnik?" CreateUserUrl="~/novikorisnik.aspx" 
        LoginButtonText="Uđi" PasswordRecoveryText="Zaboravljena šifra?" 
        PasswordRequiredErrorMessage="Šifra je neohodna" 
        UserNameRequiredErrorMessage="Korisničko ime je neophodno" 
        PasswordRecoveryUrl="~/zaboravljena.aspx" 
    PasswordRecoveryIconUrl="~/images/key-icon1.png">
        <HyperLinkStyle Font-Italic="True" />
    </asp:Login>

</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="ContentPlaceHolderDesni1" Runat="Server">
    <h2>Korpa</h2>  
						<div class="vmenu"> 
						<img src="images/korpa.png" alt="Metal Dimitrovgarad Korpa"/>
                    </div>
</asp:Content>
<asp:Content ID="Content5" ContentPlaceHolderID="ContentPlaceHolderDesni2" Runat="Server">
</asp:Content>

