<div class="side-profile-here">
    <input type="hidden" value="1" id="testa">
    <div>
        <div id="quote-table"></div>
        <script type="text/javascript">
    // JavaScript
    //define data array
    var tabledata = [
        {
            quote_id:1, name:"Oli Bob", product:'Click to View', premium:"48, 700", quote_date:'19/02/2023', created_by:"Sylvester Ouma", status:"Pending", action:'View'
        },
        {
            quote_id:2, name:"Mary May", product:'Click to View', premium:"64, 300", quote_date:'14/03/2023', created_by:"Matthew Kimweli", status:"Pending", action:'View'
        },
        {
            quote_id:3, name:"Christine Lobowski", product:'Click to View', premium:"84, 900", quote_date:'22/01/2023', created_by:"Joseph Karanja", status:"Submitted", action:'View'
        },
        {
            quote_id:4, name:"Brendon Philips", product:'Click to View', premium:"63, 200", quote_date:'01/04/2023', created_by:"Christine Gakii", status:"Submitted", action:'View'
        },
        {
            quote_id:5, name:"Margret Marmajuke", product:'Click to View', premium:"100, 400", quote_date:'31/01/2023', created_by:"David Kang'ethe", status:"Submitted", action:'View'
        },
        {
            quote_id:6, name:"Frank Harbours", product:'Click to View', premium:"78, 100", quote_date:'12/03/2023', created_by:"Edward Heinemanns", status:"Pending", action:'View'
        },
    ];

    //create popup element
    var popupContents = document.createElement("div");
    popupContents.innerText = "Motor Private";

    //initialise table
    var table = new Tabulator("#quote-table", {
        // height:220,
        data:tabledata,           //load row data from array
        layout:"fitColumns",      //fit columns to width of table
        responsiveLayout:"hide",  //hide columns that dont fit on the table
        addRowPos:"top",          //when adding a new row, add it to the top of the table
        history:true,             //allow undo and redo actions on the table
        pagination:"local",       //paginate the data
        paginationSize:5,         //allow 5 rows per page of data
        paginationCounter:"rows", //display count of paginated rows in footer
        movableColumns:true,      //allow column order to be changed
        initialSort:[             //set the initial sort order of the data
            {column:"quote_id", dir:"asc"},
        ],
        columnDefaults:{
            tooltip:false,         //show tool tips on cells
        },

        columns:[
            //define the table columns
            {title:"Quote ID", field:"quote_id",},
            {title:"Name", field:"name",headerFilter:"input"},
            {title:"Product", field:"product", hozAlign:"left", clickPopup:popupContents, tooltip:true},
            {title:"Premium", field:"premium"},
            {title:"Quote Date", field:"quote_date", hozAlign:"left"},
            {title:"Created By", field:"created_by", },
            {title:"Status", field:"status", sorter:"quote_date", hozAlign:"center"},
            {title:"Action", field:"action", hozAlign:"center"},
        ],
    });

</script>
    </div>
</div>
