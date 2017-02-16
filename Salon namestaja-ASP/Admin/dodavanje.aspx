<%@ Page Title="" Language="C#"  MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="dodavanje.aspx.cs" Inherits="Admin_dodavanje" %>

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
    <<a href="">
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


<h1>Dodavanje</h1>
    <p>
        </p>
    <p >
        Izaberite opciju:</p>
   
    <p>
        <asp:DropDownList ID="DropDownList1" runat="server" 
            onselectedindexchanged="DropDownList1_SelectedIndexChanged" 
            AutoPostBack="True">
            <asp:ListItem Value="0">Izaberi</asp:ListItem>
            <asp:ListItem Value="2">Projzvod</asp:ListItem>
            <asp:ListItem Value="1">Kategorija</asp:ListItem>
            <asp:ListItem Value="3">Korisnik</asp:ListItem>
            <asp:ListItem Value="4">Slike</asp:ListItem>
        </asp:DropDownList>
    </p>
    <p>
        &nbsp;</p>
    <asp:Panel ID="PanelKorisnik" runat="server" Visible="False">
        <asp:CreateUserWizard ID="CreateUserWizard1" runat="server" 
            AnswerLabelText="Odgovor na beubedonosno pitanje" 
            AnswerRequiredErrorMessage="Bezbedonosno pitanje je neophodno" 
            CancelButtonText="Odustani" 
            CompleteSuccessText="Vaš nalog je uspešno napravljen" 
            ConfirmPasswordCompareErrorMessage="Lozinka i potvrda lozinke moraju da budu iste" 
            ConfirmPasswordLabelText="Potvrdite šifru" 
            ConfirmPasswordRequiredErrorMessage="Potvrda lozinke je neophodna" 
            ContinueButtonText="Nastavi" CreateUserButtonText="Kreiraj korisnika" 
            DuplicateEmailErrorMessage="Postojeći e-mail" 
            DuplicateUserNameErrorMessage="Ovo korisničko ime je zauzeto" 
            EmailRegularExpressionErrorMessage="Molimo vas unesite  e-mail." 
            EmailRequiredErrorMessage="E-mail je neohpdan." FinishCompleteButtonText="Kraj" 
            FinishDestinationPageUrl="~/Default.aspx" FinishPreviousButtonText="Prethodni" 
            InvalidAnswerErrorMessage="Netačan odgovor" 
            InvalidEmailErrorMessage="Molimo vas unesite e-mail" 
            InvalidPasswordErrorMessage="Pogrešan forman šifre" 
            InvalidQuestionErrorMessage="unesite drugo bezbednosno pitanje" 
            PasswordLabelText="Šifra" 
            PasswordRegularExpressionErrorMessage="Pogrešan format lozinke" 
            PasswordRequiredErrorMessage="Šifra je potrebna" 
            QuestionLabelText="Bezbednosno pitanje" 
            QuestionRequiredErrorMessage="Bezbedonosno pitanje je neophodno" 
            StartNextButtonText="Sledeći" StepNextButtonText="Sledeći" 
            StepPreviousButtonText="Prethodni" 
            UnknownErrorMessage="Nalog nije kreiran.Pokušajte ponovo" 
            UserNameLabelText="Korisničko ime" 
            UserNameRequiredErrorMessage="Korisničko ime je neophodno">
            <WizardSteps>
                <asp:CreateUserWizardStep runat="server" />
                <asp:CompleteWizardStep runat="server" />
            </WizardSteps>
        </asp:CreateUserWizard>
    </asp:Panel>
    <asp:Panel ID="PanelProjzvod" runat="server" Visible="False" Height="342px" 
        Width="561px">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<asp:Label ID="Label1" 
            runat="server" Font-Size="Large" Text="~Dodavanje projzvoda~"></asp:Label>
        &nbsp;<br />
        <asp:Label ID="LabelNazivP" runat="server" Text="Naziv:"></asp:Label>
        <asp:TextBox ID="TextBoxNazivP" runat="server"></asp:TextBox>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
            ControlToValidate="TextBoxNazivP" ErrorMessage="Niste uneli vrednost" 
            ForeColor="Red"></asp:RequiredFieldValidator>
        <br />
        <asp:Label ID="LabelCena" runat="server" Text="Cena:"></asp:Label>
        <asp:TextBox ID="TextBoxCena" runat="server"></asp:TextBox>
        <asp:RangeValidator ID="RangeValidator1" runat="server" 
            ControlToValidate="TextBoxCena" ErrorMessage="Unesite vrednost" ForeColor="Red" 
            MaximumValue="999999" MinimumValue="1"></asp:RangeValidator>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
            ControlToValidate="TextBoxCena" ErrorMessage="Unesite vrednost" ForeColor="Red"></asp:RequiredFieldValidator>
        <br />
        <asp:Label ID="LabelKategorija" runat="server" Text="Kategorija:"></asp:Label>
        <asp:DropDownList ID="DropDownListKategorija" runat="server" 
            DataSourceID="SqlDataSource1" DataTextField="naziv" DataValueField="id">
        </asp:DropDownList>
        <br />
        <asp:Label ID="LabelOpis" runat="server" Text="Opis:"></asp:Label>
        <asp:TextBox ID="TextBoxOpis" runat="server" TextMode="MultiLine"></asp:TextBox>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
            ControlToValidate="TextBoxOpis" ErrorMessage="Potrebno je uneti opis" 
            ForeColor="Red"></asp:RequiredFieldValidator>
        <br />
        <asp:Label ID="LabelSlika" runat="server" Text="Slika:"></asp:Label>
        <asp:FileUpload ID="FileUploadSlikaP" runat="server" />
        <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
            ControlToValidate="FileUploadSlikaP" ErrorMessage="Morate izabrati sliku" 
            ForeColor="Red"></asp:RequiredFieldValidator>
        <br />
        <asp:Label ID="LabelAkcija" runat="server" Text="Akcija:"></asp:Label>
        <asp:CheckBox ID="CheckBoxAkcija" Text="Da" runat="server" />
        <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:aspAuditorneConnectionString %>" 
            SelectCommand="SELECT * FROM [kategorija]"></asp:SqlDataSource>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <asp:Button ID="ButtonUnesiP" runat="server" Text="Unesi" 
            onclick="ButtonUnesiP_Click" />
        <br />
      
    </asp:Panel>
   
     <asp:Panel ID="PanelKategorija" runat="server" Visible="False">
         <asp:Label ID="LabelNaizvK" runat="server" Text="Naziv"></asp:Label><asp:TextBox ID="TextBoxNazivK"
             runat="server"></asp:TextBox>
      <br />
         <asp:Label ID="LabelSlikaK" runat="server" Text="Slika:"></asp:Label><asp:FileUpload
             ID="FileUploadSlikaK" runat="server" />
             <br />
         <asp:Button ID="ButtonUnesiK" runat="server" Text="Unesi" 
             onclick="ButtonUnesiK_Click" />
        </asp:Panel>
    <asp:Panel ID="PanelSlika" runat="server" Visible="False">
      
        <asp:Label ID="Label3" runat="server" Text="Kratki opis:"></asp:Label><asp:TextBox
            ID="TextBoxSlika" runat="server"></asp:TextBox>
        <br>
        <br></br>
        <asp:FileUpload ID="FileUploadslika" runat="server" />
        <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Unesi sliku" />
        </br>
    </asp:Panel>

</asp:Content>
<asp:Content ID="Content5" ContentPlaceHolderID="ContentPlaceHolderDesni1" Runat="Server">
    <h2>Korpa</h2>  
						<div class="vmenu"> 
						<img src="../images/korpa.png" alt="Metal Dimitrovgarad Korpa"/>
                    </div>
</asp:Content>
<asp:Content ID="Content6" ContentPlaceHolderID="ContentPlaceHolderDesni2" Runat="Server">
</asp:Content>

