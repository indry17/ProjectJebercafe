    <!-- Food Area starts -->
    <section id="menu" class="bg-no-repeat bg-[right_top_15rem] md:bg-right-top pt-8 md:pt-32 w-full" style="background-image: url({{ $foodBg }})">
      <div class="flex flex-col justify-around items-center food-sm:items-start max-w-[980px] mx-auto">
        <div class="food-sm:text-left m-4 max-w-sm mt-5 p-4 text-center">
          <h3 class="font-bold font-cursive-merie text-4xl leading-normal capitalize">
            <span class="text-amber-400 leading-snug">Today's</span> <br /><span class="leading-normal">Menu & Promo</span>
          </h3>
          <p class="pt-4 text-[14px] font-sans-lato text-slate-600 leading-relaxed">Dapatkan diskon spesial untuk setiap pembelian di awal tahun ini! Jangan lewatkan kesempatan emas ini!
        </div>
        <div class="flex flex-wrap justify-center lg:justify-between  mt-5">
          @foreach ($fooddata as $data)
          <div class="max-w-[290px] m-4 shadow-md group transition">
            <img class="w-full h-auto" src={{ $data['img'] }} alt={{$data['name']."-image"}}>
            <div class="p-7 bg-slate-100 group-hover:bg-amber-400 transition duration-300 min-h-[170px]">
              <div class="flex flex-wrap justify-between font-bold font-cursive-merie text-lg">
                <h5 class='p-1 leading-normal capitalize'>{{ $data['name'] }}</h5>
                <span class="text-amber-400 group-hover:text-slate-600 p-1 text-right">Rp{{ $data['price'] }}</span>
              </div>
              <p class="pt-4 text-[14px] font-sans-lato text-slate-600 leading-relaxed">{{ $data['desc'] }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Food Area End -->
