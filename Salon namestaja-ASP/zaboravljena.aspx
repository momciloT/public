<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="zaboravljena.aspx.cs" Inherits="zaboravljena" %>

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
    <asp:PasswordRecovery ID="PasswordRecovery1" runat="server" 
    AnswerLabelText="Odgovor:" AnswerRequiredErrorMessage="Odgovor je neohodan" 
    GeneralFailureText="Neuspesan pokusaj.Pokusajte ponovo" 
    QuestionFailureText="Molimo pokusajte ponovo" 
    QuestionInstructionText="Odgovorite na pitanje da bi ste dobili lozinku:" 
    QuestionLabelText="Pitanje:" SubmitButtonText="Dalje" 
    SuccessText="Lozinka vam je poslata." 
    UserNameFailureText="Trenutno nismo u mogucnosti da vam obnovimo lozinku.Pokusajte kasnije" 
    UserNameInstructionText="Upisite svoje orisnicko ime:" 
    UserNameLabelText="Korisnicko ime:" 
    UserNameRequiredErrorMessage="Korisnicko ime je neohodno" 
    UserNameTitleText="Zaboravljenja lozinka?">
    </asp:PasswordRecovery>
</asp:Content>
<asp:Content ID="Content5" ContentPlaceHolderID="ContentPlaceHolderDesni1" Runat="Server">
<h2>Korpa</h2>  
						<div class="vmenu"> 
						<img src="images/korpa.png" alt="Metal Dimitrovgarad Korpa"/>
                    </div>
</asp:Content>
<asp:Content ID="Content6" ContentPlaceHolderID="ContentPlaceHolderDesni2" Runat="Server">
</asp:Content>

