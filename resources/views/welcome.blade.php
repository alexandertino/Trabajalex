<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Controladores</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        :root{
            --primary:#6366f1;
            --primary-dark:#4f46e5;
            --text:#1f2937;
        }
        *{margin:0;padding:0;box-sizing:border-box;}

        body{
            font-family:'Poppins',sans-serif;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background:linear-gradient(45deg,#c7d2fe,#e0e7ff,#f0f4ff,#dbeafe);
            background-size:400% 400%;
            animation:grad 18s ease infinite;
        }
        @keyframes grad{
            0%{background-position:0% 50%}
            50%{background-position:100% 50%}
            100%{background-position:0% 50%}
        }

        .container{
            background:rgba(255,255,255,0.85);
            backdrop-filter:blur(12px);
            padding:3rem 4rem;
            border-radius:24px;
            box-shadow:0 20px 40px rgba(0,0,0,.1);
            text-align:center;
            max-width:700px;
            width:90%;
        }

        h1{
            font-size:2.6rem;
            margin-bottom:2.2rem;
            color:var(--text);
            position:relative;
            overflow:hidden;
        }
        h1::after{
            content:'';
            position:absolute;
            left:50%;
            bottom:0;
            width:0;
            height:3px;
            background:var(--primary);
            transition:width .6s ease,left .6s ease;
        }
        h1:hover::after{width:100%;left:0;}

        .cards{
            display:flex;
            flex-direction:column;
            gap:1.4rem;
        }
        @media(min-width:600px){
            .cards{flex-direction:row;}
        }

        .card{
            position:relative;
            flex:1 1 auto;
            padding:1.2rem 2.5rem;
            background:var(--primary);
            color:#fff;
            border-radius:16px;
            font-size:1.25rem;
            font-weight:600;
            text-decoration:none;
            overflow:hidden;
            transition:transform .4s cubic-bezier(.25,.46,.45,.94),box-shadow .4s;
        }

        .card::before,
        .card::after{
            content:'';
            position:absolute;
            inset:0;
            border-radius:inherit;
            pointer-events:none;
            transition:opacity .5s ease,transform .8s cubic-bezier(.19,1,.22,1);
        }
        .card::before{
            background:rgba(255,255,255,.15);
            opacity:0;
        }
        .card::after{
            background:linear-gradient(130deg,transparent 0%,rgba(255,255,255,.4) 40%,transparent 70%);
            transform:translateX(-100%);
        }

        /* Hover dinámico */
        .card:hover{
            transform:translateY(-8px) scale(1.04);
            box-shadow:0 15px 25px rgba(79,70,229,.4);
        }
        .card:hover::before{opacity:1;}
        .card:hover::after{transform:translateX(120%);}
        .card:active{transform:scale(.97);}

        .ripple{
            position:absolute;
            border-radius:50%;
            background:rgba(255,255,255,.7);
            transform:scale(0);
            animation:rip 600ms linear;
            pointer-events:none;
        }
        @keyframes rip{
            to{transform:scale(4);opacity:0;}
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Controladores</h1>

        <div class="cards">
            <a class="card" href="{{ route('cliente.index') }}"><span>Cliente</span></a>
            <a class="card" href="{{ route('categoria.index') }}"><span>Categoria</span></a>
            <a class="card" href="{{ route('producto.index') }}"><span>Producto</span></a>
        </div>
    </div>

    <script>
        document.querySelectorAll('.card').forEach(btn=>{
            btn.addEventListener('click',e=>{
                const circle=document.createElement('span');
                const d=Math.max(btn.clientWidth,btn.clientHeight);
                circle.classList.add('ripple');
                circle.style.width=circle.style.height=`${d}px`;
                circle.style.left=`${e.clientX-btn.getBoundingClientRect().left-d/2}px`;
                circle.style.top=`${e.clientY-btn.getBoundingClientRect().top-d/2}px`;
                btn.appendChild(circle);
                setTimeout(()=>circle.remove(),600);
            });
        });
    </script>
</body>
</html>
