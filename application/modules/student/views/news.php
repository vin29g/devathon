<title> News | TAPS NITW</title>
<h3>News Cards</h3>
<div class="row">
    <div class="col s6">
<a class="btn waves-effect waves-light blue" id="old">Latest News</a>
<a class="btn waves-effect waves-light blue" id="new">Oldest News</a>
</div>

<div class="col s3 offset-s9 "><input id="filter" type="text" name="fname" placeholder="Search by context"></div>
</div>

<br>
<div>
    <div class="row" id="timelist">
        <?php foreach($news as $new){?>

        <div class="col s12 m4 l4 test " data-time="<?php echo $new['timestamp']?>" >
            <div class="z-depth-2">
                <div class="card" >
                    <div class="card-content">
                        <div class="row">
                            <div class="col s3 "><?php echo $new['title']?></div>
                            <div class="col s6 offset-s3"><?php echo $new['timestamp']?></div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="container">
                                 <div class="col s12 contentlist"><?php echo $new['content']?></div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php }?>
</div>
</div>
<script type="text/javascript">

var $divs = $("div.test");
$('#old').on('click', function () {
    var alphabeticallyOrderedDivs = $divs.sort(function (a, b) {
        return $(a).attr('data-time') < $(b).attr('data-time');
    });
    $("#timelist").html(alphabeticallyOrderedDivs);
});
$('#new').on('click', function () {
    var alphabeticallyOrderedDivs = $divs.sort(function (a, b) {
        return $(a).attr('data-time') > $(b).attr('data-time');
    });
    $("#timelist").html(alphabeticallyOrderedDivs);
});
$("#filter").bind("keyup", function() {
    var text = $(this).val().toLowerCase();
    var items = $(".contentlist");
    
    //first, hide all:
    items.parent().parent().parent().parent().hide();
    
    //show only those matching user input:
    items.filter(function () {
        return $(this).text().toLowerCase().indexOf(text) == 0;
    }).parent().parent().parent().parent().show();
});
</script>
