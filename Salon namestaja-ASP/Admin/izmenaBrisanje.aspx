<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="izmenaBrisanje.aspx.cs" Inherits="Admin_izmenaBrisanje" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <script src="../js/ie6.js" type="text/javascript"></script>
    <script src="../js/shadowbox.js" type="text/javascript"></script>
    <script src="../js/jquery-1.4.min.js" type="text/javascript"></script>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/login.js" type="text/javascript"></script>
    <script src="../js/menie.js" type="text/javascript"></script>
    <script src="../js/scripts.js" type="text/javascript"></script>
    <style type="text/css">
    .maxWidthGrid
    {
        max-width: 300px;
        overflow: hidden;
    }
</style>
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
    <h1>Izmena i Brisanje</h1></br>
    
    Izaberite opciju:<asp:DropDownList ID="DropDownList1" runat="server" 
        onselectedindexchanged="DropDownList1_SelectedIndexChanged" 
        AutoPostBack="True">
        <asp:ListItem>Izaberi</asp:ListItem>
        <asp:ListItem Value="1">Projzvod</asp:ListItem>
        <asp:ListItem Value="2">Kategorija</asp:ListItem>
        <asp:ListItem Value="3">Slika</asp:ListItem>
    </asp:DropDownList>
    <asp:Panel ID="PanelProjzvod" runat="server" Visible="False">
        <asp:DetailsView ID="DetailsView1" runat="server" AllowPaging="True" 
            CellPadding="4" DataSourceID="SqlDataSource1" ForeColor="#333333" 
            GridLines="None" Height="50px" Width="125px">
            <AlternatingRowStyle BackColor="White" />
            <CommandRowStyle BackColor="#D1DDF1" Font-Bold="True" />
            <EditRowStyle BackColor="#2461BF" />
            <FieldHeaderStyle BackColor="#DEE8F5" Font-Bold="True" />
            <Fields>
                <asp:CommandField ShowDeleteButton="True" ShowEditButton="True" />
            </Fields>
            <FooterStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
            <PagerStyle BackColor="#2461BF" ForeColor="White" HorizontalAlign="Center" />
            <RowStyle BackColor="#EFF3FB" />
        </asp:DetailsView>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConflictDetection="CompareAllValues" 
            ConnectionString="<%$ ConnectionStrings:aspAuditorneConnectionString %>" 
            DeleteCommand="DELETE FROM [Projzvodi] WHERE [id] = @original_id AND [id_kategorije] = @original_id_kategorije AND (([naziv] = @original_naziv) OR ([naziv] IS NULL AND @original_naziv IS NULL)) AND (([cena] = @original_cena) OR ([cena] IS NULL AND @original_cena IS NULL)) AND (([opis] = @original_opis) OR ([opis] IS NULL AND @original_opis IS NULL)) AND (([slika] = @original_slika) OR ([slika] IS NULL AND @original_slika IS NULL)) AND (([akcija] = @original_akcija) OR ([akcija] IS NULL AND @original_akcija IS NULL))" 
            InsertCommand="INSERT INTO [Projzvodi] ([id_kategorije], [naziv], [cena], [opis], [slika], [akcija]) VALUES (@id_kategorije, @naziv, @cena, @opis, @slika, @akcija)" 
            OldValuesParameterFormatString="original_{0}" 
            SelectCommand="SELECT * FROM [Projzvodi]" 
            UpdateCommand="UPDATE [Projzvodi] SET [id_kategorije] = @id_kategorije, [naziv] = @naziv, [cena] = @cena, [opis] = @opis, [slika] = @slika, [akcija] = @akcija WHERE [id] = @original_id AND [id_kategorije] = @original_id_kategorije AND (([naziv] = @original_naziv) OR ([naziv] IS NULL AND @original_naziv IS NULL)) AND (([cena] = @original_cena) OR ([cena] IS NULL AND @original_cena IS NULL)) AND (([opis] = @original_opis) OR ([opis] IS NULL AND @original_opis IS NULL)) AND (([slika] = @original_slika) OR ([slika] IS NULL AND @original_slika IS NULL)) AND (([akcija] = @original_akcija) OR ([akcija] IS NULL AND @original_akcija IS NULL))">
            <DeleteParameters>
                <asp:Parameter Name="original_id" Type="Int32" />
                <asp:Parameter Name="original_id_kategorije" Type="Int32" />
                <asp:Parameter Name="original_naziv" Type="String" />
                <asp:Parameter Name="original_cena" Type="Double" />
                <asp:Parameter Name="original_opis" Type="String" />
                <asp:Parameter Name="original_slika" Type="String" />
                <asp:Parameter Name="original_akcija" Type="Int32" />
            </DeleteParameters>
            <InsertParameters>
                <asp:Parameter Name="id_kategorije" Type="Int32" />
                <asp:Parameter Name="naziv" Type="String" />
                <asp:Parameter Name="cena" Type="Double" />
                <asp:Parameter Name="opis" Type="String" />
                <asp:Parameter Name="slika" Type="String" />
                <asp:Parameter Name="akcija" Type="Int32" />
            </InsertParameters>
            <UpdateParameters>
                <asp:Parameter Name="id_kategorije" Type="Int32" />
                <asp:Parameter Name="naziv" Type="String" />
                <asp:Parameter Name="cena" Type="Double" />
                <asp:Parameter Name="opis" Type="String" />
                <asp:Parameter Name="slika" Type="String" />
                <asp:Parameter Name="akcija" Type="Int32" />
                <asp:Parameter Name="original_id" Type="Int32" />
                <asp:Parameter Name="original_id_kategorije" Type="Int32" />
                <asp:Parameter Name="original_naziv" Type="String" />
                <asp:Parameter Name="original_cena" Type="Double" />
                <asp:Parameter Name="original_opis" Type="String" />
                <asp:Parameter Name="original_slika" Type="String" />
                <asp:Parameter Name="original_akcija" Type="Int32" />
            </UpdateParameters>
        </asp:SqlDataSource>
    </asp:Panel>
    <asp:Panel ID="PanelKategorija" runat="server" Visible="False">
        <asp:GridView ID="GridView2" runat="server" CellPadding="4" 
            DataSourceID="SqlDataSourceKategorija" ForeColor="#333333" 
            GridLines="None" AllowPaging="True" AutoGenerateColumns="False" 
            DataKeyNames="id">
            <AlternatingRowStyle BackColor="White" />
            <Columns>
                <asp:CommandField ShowDeleteButton="True" ShowEditButton="True" />
                <asp:BoundField DataField="id" HeaderText="id" InsertVisible="False" 
                    ReadOnly="True" SortExpression="id" />
                <asp:BoundField DataField="naziv" HeaderText="naziv" SortExpression="naziv" />
                <asp:BoundField DataField="putanja" HeaderText="putanja" 
                    SortExpression="putanja" />
            </Columns>
            <EditRowStyle BackColor="#2461BF" />
            <FooterStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
            <PagerStyle BackColor="#2461BF" ForeColor="White" HorizontalAlign="Center" />
            <RowStyle BackColor="#EFF3FB" />
            <SelectedRowStyle BackColor="#D1DDF1" Font-Bold="True" ForeColor="#333333" />
            <SortedAscendingCellStyle BackColor="#F5F7FB" />
            <SortedAscendingHeaderStyle BackColor="#6D95E1" />
            <SortedDescendingCellStyle BackColor="#E9EBEF" />
            <SortedDescendingHeaderStyle BackColor="#4870BE" />
        </asp:GridView>
        <asp:SqlDataSource ID="SqlDataSourceKategorija" runat="server" 
            ConflictDetection="CompareAllValues" 
            ConnectionString="<%$ ConnectionStrings:aspAuditorneConnectionString %>" 
            DeleteCommand="DELETE FROM [kategorija] WHERE [id] = @original_id AND (([naziv] = @original_naziv) OR ([naziv] IS NULL AND @original_naziv IS NULL)) AND (([putanja] = @original_putanja) OR ([putanja] IS NULL AND @original_putanja IS NULL))" 
            InsertCommand="INSERT INTO [kategorija] ([naziv], [putanja]) VALUES (@naziv, @putanja)" 
            OldValuesParameterFormatString="original_{0}" 
            SelectCommand="SELECT * FROM [kategorija]" 
            UpdateCommand="UPDATE [kategorija] SET [naziv] = @naziv, [putanja] = @putanja WHERE [id] = @original_id AND (([naziv] = @original_naziv) OR ([naziv] IS NULL AND @original_naziv IS NULL)) AND (([putanja] = @original_putanja) OR ([putanja] IS NULL AND @original_putanja IS NULL))">
            <DeleteParameters>
                <asp:Parameter Name="original_id" Type="Int32" />
                <asp:Parameter Name="original_naziv" Type="String" />
                <asp:Parameter Name="original_putanja" Type="String" />
            </DeleteParameters>
            <InsertParameters>
                <asp:Parameter Name="naziv" Type="String" />
                <asp:Parameter Name="putanja" Type="String" />
            </InsertParameters>
            <UpdateParameters>
                <asp:Parameter Name="naziv" Type="String" />
                <asp:Parameter Name="putanja" Type="String" />
                <asp:Parameter Name="original_id" Type="Int32" />
                <asp:Parameter Name="original_naziv" Type="String" />
                <asp:Parameter Name="original_putanja" Type="String" />
            </UpdateParameters>
        </asp:SqlDataSource>
    </asp:Panel>
    <asp:Panel ID="PanelSlika" runat="server" Visible="False">
        <asp:DetailsView ID="DetailsViewSlike" runat="server" Height="50px" 
            Width="125px" AllowPaging="True" AutoGenerateRows="False" CellPadding="4" 
            DataKeyNames="id" DataSourceID="SqlDataSourceSlike" ForeColor="#333333" 
            GridLines="None">
            <AlternatingRowStyle BackColor="White" />
            <CommandRowStyle BackColor="#D1DDF1" Font-Bold="True" />
            <EditRowStyle BackColor="#2461BF" />
            <FieldHeaderStyle BackColor="#DEE8F5" Font-Bold="True" />
            <Fields>
                <asp:BoundField DataField="id" HeaderText="id" InsertVisible="False" 
                    ReadOnly="True" SortExpression="id" />
                <asp:BoundField DataField="putanja" HeaderText="putanja" 
                    SortExpression="putanja" />
                <asp:CommandField ShowDeleteButton="True" ShowEditButton="True" />
            </Fields>
            <FooterStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
            <PagerStyle BackColor="#2461BF" ForeColor="White" HorizontalAlign="Center" />
            <RowStyle BackColor="#EFF3FB" />
        </asp:DetailsView>

    <asp:SqlDataSource ID="SqlDataSourceSlike" runat="server" 
            ConflictDetection="CompareAllValues" 
            ConnectionString="<%$ ConnectionStrings:aspAuditorneConnectionString %>" 
            DeleteCommand="DELETE FROM [Galerija] WHERE [id] = @original_id AND (([putanja] = @original_putanja) OR ([putanja] IS NULL AND @original_putanja IS NULL))" 
            InsertCommand="INSERT INTO [Galerija] ([putanja]) VALUES (@putanja)" 
            OldValuesParameterFormatString="original_{0}" 
            SelectCommand="SELECT * FROM [Galerija]" 
            UpdateCommand="UPDATE [Galerija] SET [putanja] = @putanja WHERE [id] = @original_id AND (([putanja] = @original_putanja) OR ([putanja] IS NULL AND @original_putanja IS NULL))">
        <DeleteParameters>
            <asp:Parameter Name="original_id" Type="Int32" />
            <asp:Parameter Name="original_putanja" Type="String" />
        </DeleteParameters>
        <InsertParameters>
            <asp:Parameter Name="putanja" Type="String" />
        </InsertParameters>
        <UpdateParameters>
            <asp:Parameter Name="putanja" Type="String" />
            <asp:Parameter Name="original_id" Type="Int32" />
            <asp:Parameter Name="original_putanja" Type="String" />
        </UpdateParameters>
        </asp:SqlDataSource>
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

