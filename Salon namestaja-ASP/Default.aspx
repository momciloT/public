<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <link href="style.css" rel="stylesheet" type="text/css" />
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderLevi" Runat="Server">
 <h2>Naši parteneri:</h2>
                    <div class="vmenu"> 
                    
                          <img id="" src="images/logo.png" alt="Metal Dimitrovgrad partneri"  />
                      
                    </div>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderGlavni" Runat="Server">
 
<h1>Dobro došli</h1>
</br>

Želite li novu kuhinju, plakar, tv komodu, krevet, računarski sto, cipelarnik, elemnte u kupatilu, kuhinjski sto, predsoblje, police, ili bilo šta drugo što može učiniti Vaš stan, lokal ili poslovni prostor prijatnim mestom za život?! </br>
 

Na pravom ste mestu! 
 </br>

Trudimo se da svojim rešenjima učinimo da Vaš prostor bude maksimalno iskorišćen i moderno opremljen nameštajem koji je vrhunski izrađen po Vašoj želji i meri od pločastih materijala (univer i medijapan), u savršenoj kombinaciji sa drvetom, staklom i furnirom. 
 </br>

U svom radu koristimo opremu, materijale i delove renomiranih proizvođača, tako da Vam svojim iskustvom i pruženim kvalitetom garantujemo dugo i sigurno korišćenje naših proizvoda. 
 </br>

Na našem sajtu, u delu Galerija slika možete da vidite jedan mali deo od svega onoga što smo do sada uradili, a za sve dodatne informacije stojimo Vam na raspolaganju. 
 
</br>
Nadajući se uspešnoj saradnji, srdačno Vas pozdravljamo!
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="ContentPlaceHolderDesni1" Runat="Server">
<h2>Korpa</h2>  
						<div class="vmenu"> 
						<img src="images/korpa.png" alt="Metal Dimitrovgarad Korpa"/>
                    </div>
</asp:Content>
<asp:Content ID="Content5" ContentPlaceHolderID="ContentPlaceHolderDesni2" Runat="Server">
    <asp:Panel ID="PanelAnketa" runat="server">


    </asp:Panel>
    <asp:Panel ID="PanelRezulatatA" runat="server">
    <h2>Anketa-Ocenite sajt?</h2>
        <asp:RadioButtonList ID="RadioButtonList1" runat="server" Width="195px">
        <asp:ListItem Text="Da" Value="1"></asp:ListItem>
        <asp:ListItem Text="Ne" Value="2"></asp:ListItem>
        <asp:ListItem Text="Onako" Value="3"></asp:ListItem>
        </asp:RadioButtonList>
     
       
            <asp:Label ID="Labelgreska" runat="server" Text=""></asp:Label>
        <br>
       
        <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Glasaj" />
     
    </asp:Panel>

</asp:Content>

