<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="novikorisnik.aspx.cs" Inherits="novikorisnik" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderslajder" Runat="Server">
 <a href="">
        <img id="slide-img-1" src="images/slajd1.jpg" class="slide" alt="" /></a>
             <a href=""><img id="slide-img-2" src="images/slajd2.jpg" class="slide" alt="" /></a>
     <a href=""><img id="slide-img-3" src="images/slajd3.jpg" class="slide" alt="" /></a>
</asp:Content>

<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderLevi" Runat="Server">
<h2>Naši parteneri:</h2>
                    <div class="vmenu"> 
                    
                          <img id="" src="images/logo.png" alt="Metal Dimitrovgrad partneri"  />
                      
                    </div>
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="ContentPlaceHolderGlavni" Runat="Server">
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
                <asp:CreateUserWizardStep ID="CreateUserWizardStep1" runat="server" />
                <asp:CompleteWizardStep ID="CompleteWizardStep1" runat="server" />
            </WizardSteps>
        </asp:CreateUserWizard>
</asp:Content>
<asp:Content ID="Content5" ContentPlaceHolderID="ContentPlaceHolderDesni1" Runat="Server">
<h2>Korpa</h2>  
						<div class="vmenu"> 
						<img src="images/korpa.png" alt="Metal Dimitrovgarad Korpa"/>
                    </div>
</asp:Content>
<asp:Content ID="Content6" ContentPlaceHolderID="ContentPlaceHolderDesni2" Runat="Server">
</asp:Content>

