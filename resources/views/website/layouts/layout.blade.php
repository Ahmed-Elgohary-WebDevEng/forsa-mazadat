<!doctype html>
<html lang="ar" dir="rtl">

<head>
  @include('website.includes.head')
	<style>
		.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            background-color: rgb(35, 96, 86)!important;
            color: #FFC000 !important;
        }
	</style>

</head>

{{--<body  style="background-image:url('{{ asset('img/background.jpg')}}');">--}}
<body>
  <header>
    <nav class="mb-5">
      @include('website.includes.nav')

    </nav>
    @include('website.includes.header')
  </header>
  <section class="mt-5">
    @yield('content')
  </section>


  <footer class="text-center footer">


    @include('website.includes.footer')


  </footer>
  <div class="text-center text-white copyright py-4">
        <div class="container"><small>Copyright ©&nbsp;Panorama-Q.com 2023</small></div>
    </div>
    <div class="modal text-center " role="dialog" tabindex="-1" id="portfolio-modal-6">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal">
                </button>
                </div>
            </div>
        </div>
	</div>
  {{-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
{{--   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}

   {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
 --}}
{{--   <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/freelancer.js') }}"></script> --}}
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>




  <script>
    const option1 = document.querySelectorAll(".viewsiteType option");

    window.onload = function() {
    var selIteem = localStorage.getItem("SelItem");  
    $('.viewsiteType').val(selIteem);
    }
    $('.viewsiteType').change(function() { 
        var selVall = $(this).val();
        localStorage.setItem("SelItem", selVall);
        location.href = $(this).val();

    });
    if(localStorage.getItem("SelItem")) {
      for(const option of option1) {
        var selVall = option.$(this).val();
    if(selVall === sessionStorage.getItem("SelItem")) {
      option.setAttribute("selected", "");
      break;

    }
    localStorage.removeItem("SelItem");

  }

    }
  </script>
  <script>
    
    const select = document.querySelector(".viewsitePlace");
const options = document.querySelectorAll(".viewsitePlace option");

  

// 1 
select.addEventListener("change", function() {
  const url = this.options[this.selectedIndex].dataset.url;
  if(url) {
    localStorage.setItem("url", url);
    location.href = url;
  }
});
// 2 
if(localStorage.getItem("url")) {
  for(const option of options) {
    const url = option.dataset.url;
    if(url === localStorage.getItem("url")) {
      option.setAttribute("selected", "");
      break;
    }
  }
  localStorage.removeItem("url");

}

  </script>
		<script>
			var counterContainer = document.querySelector(".website-counter");
var resetButton = document.querySelector("#reset");
var visitCount = localStorage.getItem("page_view");

// Check if page_view entry is present
if (visitCount) {
  visitCount = Number(visitCount) + 1;
  localStorage.setItem("page_view", visitCount);
} else {
  visitCount = 1;
  localStorage.setItem("page_view", 1);
}
counterContainer.innerHTML = visitCount;

// Adding onClick event listener
resetButton.addEventListener("click", () => {
  visitCount = 1;
  localStorage.setItem("page_view", 1);
  counterContainer.innerHTML = visitCount;
});
		</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    function filterText()
{  
var rex = new RegExp($('#filterText').val());
var rex2 = new RegExp($('#roleDropdown').val());
if(rex =="/all/" || rex2 =="/all/"){clearFilter()}
 if(rex !="/all/") {
 $('.content').hide();
 $('.content').filter(function() {
 return rex.test($(this).text());
 }).show();
} if(rex2 !="/all/"){
$('.content').hide();
 $('.content').filter(function() {
 return rex2.test($(this).text());
 }).show();
}  if (rex2 !="/all/" && rex !="/all/"){
$('.content').hide();
 $('.content').filter(function() {
  
    return rex2.test($(this).text()) && rex.test($(this).text());

 }).show();
    
 


}
}

function filterText1()
{  
var rex2 = new RegExp($('#roleDropdown').val());
if(rex2 =="/all/"){clearFilter()}else{
 $('.content').hide();
 $('.content').filter(function() {

 return rex2.test($(this).text());
 }).show();
}

}

function clearFilter()
{
$('.filterText').val('');
$('.content').show();
}
</script>

		<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script>
   ;(function($) {
  
  var MERCADO_JS = {
    init: function(){
       this.mercado_countdown();
       
    }, 
  mercado_countdown: function() {
       if($(".mercado-countdown").length > 0){
              $(".mercado-countdown").each( function(index, el){
                var _this = $(this),
                _expire = _this.data('expire');
             _this.countdown(_expire, function(event) {
                      $(this).html( event.strftime(`
                     <p><span>%D</span><span>يوم</span></p>
                     <p><span>%H</span><span>ساعة</span></p>
                     <p><span>%M</span><span>دقيقة</span></p>
                     <p><span>%S</span><span>ثانية</span></p>
                      
                      `
                     

                        ));
                  });
              });
       }
    },
 
 }
 
    window.onload = function () {
       MERCADO_JS.init();
    }
 
    })(window.Zepto || window.jQuery, window, document);
</script>
<script>
   $(document).ready(function(){

var url = document.location.toString();
 if (url.match('#')) {
     $('.nav-tabs a[href="#' + url.split('#')[1] + '"]')[0].click();
 } 

 //To make sure that the page always goes to the top
 setTimeout(function () {
     window.scrollTo(0, 0);
 },200);

});
</script>


  @yield('script') 

</body>

</html>
