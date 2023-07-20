window.onscroll = function() {
    scrollFunction();
    scrollFunction2();
    scrollFunction3();
    scrollFunction4();
    scrollFunction5(); 
    scrollFunction6();
    scrollFunction7();
  };
  

  function scrollFunction() {
    if (document.documentElement.scrollTop > 400) {
      document.getElementById("idSobreNos").classList.add("conteinerSobreNosOn");
    
    } else {
        
    }
  }
  function scrollFunction2() {
    if (document.documentElement.scrollTop > 900) {
      document.getElementById("idConteinerMVS").classList.add("conteinerMVSon");
    } else {
      
    }
  }
  function scrollFunction3() {
    if (document.documentElement.scrollTop > 1200) {
      document.getElementById("idConteiner2").classList.add("conteinerPortfolioOn");
    } else {
      
    }
  }
  function scrollFunction4() {
    if (document.documentElement.scrollTop > 1800) {
      document.getElementById("idConteinerContatos").classList.add("conteinerContatoon");
    } else {
      
    }
  }
 
   function scrollFunction5() {
    if (document.documentElement.scrollTop > 2100) {
      document.getElementById("idConteinerLinks").classList.add("conteinerLinksOn");
    } else {
      
    }
  }
  function scrollFunction6() {
    if (document.documentElement.scrollTop > 2400) {
      document.getElementById("idFerramentas").classList.add("ferramentasOn");
    } else {
      
    }
  }


  const menu      = document.querySelector('.nav-links');
  const burguer   = document.querySelector('.burguer');
  const linha1    = document.querySelector('#linha1');
  const linha2    = document.querySelector('#linha2');
  const linha3    = document.querySelector('#linha3');

  burguer.addEventListener('click',()=>{
      menu.classList.toggle('nav-active');
      linha1.classList.toggle('linha1-active')
      linha2.classList.toggle('linha2-active')
      linha3.classList.toggle('linha3-active')
  });

 
  
  