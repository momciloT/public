<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="pretraga.aspx.cs" Inherits="pretraga" %>

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
    <h1>Pretraga </h1></br>
    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
    <asp:Button ID="Button1"
        runat="server" Text="Pretraži projzvode" onclick="Button1_Click" />
    <asp:GridView ID="GridView1" runat="server">
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConflictDetection="CompareAllValues" 
        ConnectionString="<%$ ConnectionStrings:aspAuditorneConnectionString %>" 
        DeleteCommand="DELETE FROM [Projzvodi] WHERE [id] = @original_id AND [id_kategorije] = @original_id_kategorije AND (([naziv] = @original_naziv) OR ([naziv] IS NULL AND @original_naziv IS NULL)) AND (([cena] = @original_cena) OR ([cena] IS NULL AND @original_cena IS NULL)) AND (([akcija] = @original_akcija) OR ([akcija] IS NULL AND @original_akcija IS NULL))" 
        InsertCommand="INSERT INTO [Projzvodi] ([id_kategorije], [naziv], [cena], [akcija]) VALUES (@id_kategorije, @naziv, @cena, @akcija)" 
        OldValuesParameterFormatString="original_{0}" 
        SelectCommand="SELECT [id], [id_kategorije], [naziv], [cena], [akcija] FROM [Projzvodi]" 
        UpdateCommand="UPDATE [Projzvodi] SET [id_kategorije] = @id_kategorije, [naziv] = @naziv, [cena] = @cena, [akcija] = @akcija WHERE [id] = @original_id AND [id_kategorije] = @original_id_kategorije AND (([naziv] = @original_naziv) OR ([naziv] IS NULL AND @original_naziv IS NULL)) AND (([cena] = @original_cena) OR ([cena] IS NULL AND @original_cena IS NULL)) AND (([akcija] = @original_akcija) OR ([akcija] IS NULL AND @original_akcija IS NULL))">
        <DeleteParameters>
            <asp:Parameter Name="original_id" Type="Int32" />
            <asp:Parameter Name="original_id_kategorije" Type="Int32" />
            <asp:Parameter Name="original_naziv" Type="String" />
            <asp:Parameter Name="original_cena" Type="Double" />
            <asp:Parameter Name="original_akcija" Type="Int32" />
        </DeleteParameters>
        <InsertParameters>
            <asp:Parameter Name="id_kategorije" Type="Int32" />
            <asp:Parameter Name="naziv" Type="String" />
            <asp:Parameter Name="cena" Type="Double" />
            <asp:Parameter Name="akcija" Type="Int32" />
        </InsertParameters>
        <UpdateParameters>
            <asp:Parameter Name="id_kategorije" Type="Int32" />
            <asp:Parameter Name="naziv" Type="String" />
            <asp:Parameter Name="cena" Type="Double" />
            <asp:Parameter Name="akcija" Type="Int32" />
            <asp:Parameter Name="original_id" Type="Int32" />
            <asp:Parameter Name="original_id_kategorije" Type="Int32" />
            <asp:Parameter Name="original_naziv" Type="String" />
            <asp:Parameter Name="original_cena" Type="Double" />
            <asp:Parameter Name="original_akcija" Type="Int32" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:ObjectDataSource ID="ObjectDataSource1" runat="server" 
        DeleteMethod="Delete" InsertMethod="Insert" 
        OldValuesParameterFormatString="original_{0}" SelectMethod="GetDataByNaziv" 
        TypeName="DataSet1TableAdapters.ProjzvodiTableAdapter" UpdateMethod="Update">
        <DeleteParameters>
            <asp:Parameter Name="Original_id" Type="Int32" />
        </DeleteParameters>
        <InsertParameters>
            <asp:Parameter Name="naziv" Type="String" />
            <asp:Parameter Name="cena" Type="Double" />
            <asp:Parameter Name="opis" Type="String" />
            <asp:Parameter Name="id_kategorije" Type="Int32" />
        </InsertParameters>
        <SelectParameters>
            <asp:ControlParameter ControlID="TextBox1" Name="naziv" PropertyName="Text" 
                Type="String" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="naziv" Type="String" />
            <asp:Parameter Name="cena" Type="Double" />
            <asp:Parameter Name="opis" Type="String" />
            <asp:Parameter Name="id_kategorije" Type="Int32" />
            <asp:Parameter Name="Original_id" Type="Int32" />
        </UpdateParameters>
    </asp:ObjectDataSource>

</asp:Content>
<asp:Content ID="Content5" ContentPlaceHolderID="ContentPlaceHolderDesni1" Runat="Server">
    <h2>Korpa</h2>  
						<div class="vmenu"> 
						<img src="images/korpa.png" alt="Metal Dimitrovgarad Korpa"/>
                    </div>
</asp:Content>
<asp:Content ID="Content6" ContentPlaceHolderID="ContentPlaceHolderDesni2" Runat="Server">
</asp:Content>

