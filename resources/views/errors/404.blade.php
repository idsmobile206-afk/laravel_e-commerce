<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 | Page Not Found</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes el1Move {
      0% { top: 108px; left: 102px; opacity: 1; }
      100% { top: -10px; left: 22px; opacity: 0; }
    }
    @keyframes el2Move {
      0% { top: 92px; left: 136px; opacity: 1; }
      100% { top: -10px; left: 108px; opacity: 0; }
    }
    @keyframes el3Move {
      0% { top: 108px; left: 180px; opacity: 1; }
      100% { top: 28px; left: 276px; opacity: 0; }
    }
  </style>
</head>

<body class="bg-[#1d3041] text-white font-sans flex flex-col items-center justify-center min-h-screen p-6">

  <main class="text-center max-w-2xl">
    <h1 class="text-3xl md:text-4xl uppercase font-semibold mb-6">Error 404. The page does not exist</h1>

    <p class="text-[#bcecf2] text-base leading-relaxed mb-10">
      Sorry! The page you are looking for cannot be found. Perhaps it was moved or deleted, or maybe there was a small typo in the address.  
      You can return to the main page below.
    </p>

    <div class="relative mx-auto w-full max-w-sm min-h-[410px] flex flex-col items-center justify-end">
      <img 
        src="https://github.com/BlackStar1991/Pictures-for-sharing-/blob/master/404/bigBoom/cloud_warmcasino.png?raw=true" 
        alt="cloud explosion" 
        class="w-full mb-10"
      >

      <!-- Animated explosion layers -->
      <div 
        class="absolute top-[108px] left-[102px] w-[84px] h-[106px] bg-[url('https://github.com/BlackStar1991/Pictures-for-sharing-/blob/master/404/bigBoom/404-1.png?raw=true')] bg-center bg-no-repeat animate-[el1Move_0.8s_linear_infinite] z-20">
      </div>

      <div 
        class="absolute top-[92px] left-[136px] w-[184px] h-[106px] bg-[url('https://github.com/BlackStar1991/Pictures-for-sharing-/blob/master/404/bigBoom/404-2.png?raw=true')] bg-center bg-no-repeat animate-[el2Move_0.8s_linear_infinite] z-20">
      </div>

      <div 
        class="absolute top-[108px] left-[180px] w-[284px] h-[106px] bg-[url('https://github.com/BlackStar1991/Pictures-for-sharing-/blob/master/404/bigBoom/404-3.png?raw=true')] bg-center bg-no-repeat animate-[el3Move_0.8s_linear_infinite] z-20">
      </div>

      <!-- Go Home Button -->
      <a href="{{ url('/') }}" 
         class="inline-block mt-8 w-[260px] h-[64px] leading-[64px] text-[24px] font-bold uppercase text-white rounded-[30px] text-center 
                bg-[#f95801] shadow-[0_5px_0_#9c1007,inset_0_0_18px_rgba(253,60,0,0.75)] 
                hover:bg-[#ff7400] transition-all duration-200">
        Go Home
      </a>
    </div>
  </main>

</body>
</html>
