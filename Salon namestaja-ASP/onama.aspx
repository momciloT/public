<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="onama.aspx.cs" Inherits="onama" %>

<%@ Register Assembly="DevExpress.Web.v13.2, Version=13.2.8.0, Culture=neutral, PublicKeyToken=b88d1754d700e49a"
    Namespace="DevExpress.Web.ASPxImageSlider" TagPrefix="dx" %>

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
    <h1>O NAMA</h1>
<h4>Na osnovama dugogodišnje porodične tradicije u proizvodnji nameštaja, 2007. godine osniva se preduzeće "METAL DIMITROVGRAD".</br>
</br>
Prateći i proučavajući zahteve tržišta, počinje serijska proizvodnja programa "KIKI", sistema elemenata za opremanje dečijih soba, koji se i danas nalazi na tržištu kao jedan od najuspešnijih i vrlo jakih brendova u nameštaju. U svom asortimanu "METAL DIMITROVGRAD" danas ima još tri proizvodna programa, "RADDA" (dnevne sobe), "KALLA" (spavaće sobe) i program KUHINJA. Osnovne karakteristike naših proizvoda su vrlo visok kvalitet uz vrlo pristupačne cene. </br>
 </br>
Uz stalnu edukaciju zaposlenih, kao i konstantan nadzor kvaliteta, postignuti su rezultati koji su doprineli da je "METAL DIMITROVGRAD" danas lider u proizvodnji nameštaja na tržištu balkanskog regiona. Saradnjom sa svetski poznatim proizvođačima opreme i uvođenjem novih tehnologija u proizvodnju, formirana je jedna od najmodernijih i najuspešnijih proizvođača nameštaja u ovom delu Evrope. </br>
</br>
Danas, preduzeće "METAL DIMITROVGRAD" učestvuje na svim poznatijim sajmovima nameštaja širom Evrope, čime pokazuje da je ravnopravan konkurent mnogo poznatijim proizvođačima iz ove industrije.</br>

</br></br>
 

Nagrade i priznanja:</br>
Naši ljudi su ambiciozni, profesionalni, dinamični i posvećeni timu, koji veruje da "DELA GOVORE VIŠE OD REČI". Takav pristup nas je doveo do značajnih priznanja:</br>
</br>
Nagrada ,"ZLATNI KLJUČ" za proizvodni program "KIKI" na Sajmu nameštaja u Beogradu (novembar 2008.)</br>
Nagrada "PRO-BIZNIS LIDER ZA 2007. GODINU" za najbolje srednje preduzeće dodeljena od Privredne komore Srbije i Kluba privrednih novinara (Beograd, maj 2009.)</br>
Nagrada „BIZNIS PARTNER 2010“</br>
Nagrada „ZLATNI KLJUČ“ na 49. Međunarodnom Sajmu nameštaja u Beogradu za program „KIKI“. (novembar 2011.)</br>Fotografije nasih prodajnih mesta:</h4>
    
</br>
    <dx:ASPxImageSlider ID="ASPxImageSlider1" runat="server" 
    BinaryImageCacheFolder="~\Thumb\" ImageSourceFolder="~/ajax">
        <SettingsNavigationBar Position="Top" />
    </dx:ASPxImageSlider>
</br>
Nalazimo se na adresi:
</br>
<dl >
        <dt>11000 Beograd Srbija, <br />
          Carlija Caplina 52.</dt>
        <dd><span>Telefon: </span>+381 69 759-007
        </dd>
        <dd><span>E-mail: </span><a href="#" class="link">momchilo007@gmail.com</a></dd>
      </dl>
      </br>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.357296722973!2d20.483339600000004!3d44.81428519999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a961aaddf65%3A0xcc5d9c672d6c06d2!2z0KfQsNGA0LvQuNGY0LAg0KfQsNC_0LvQuNC90LA!5e0!3m2!1sen!2sus!4v1395085174690" width="400" height="250" frameborder="0" style="border:0"></iframe>

</asp:Content>
<asp:Content ID="Content5" ContentPlaceHolderID="ContentPlaceHolderDesni1" Runat="Server">
    <h2>Korpa</h2>  
						<div class="vmenu"> 
						<img src="images/korpa.png" alt="Metal Dimitrovgarad Korpa"/>
                    </div>
</asp:Content>
<asp:Content ID="Content6" ContentPlaceHolderID="ContentPlaceHolderDesni2" Runat="Server">
</asp:Content>

