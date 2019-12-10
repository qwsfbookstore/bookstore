   $(function () {

                var wrap = document.querySelector(".wrap");

                //给返回首页修改密码按钮添加单击事件
                $("#tab-prev").on("click", function () {
                    prev_pic();
                });
                $("#tab-next").on("click", function () {
                    next_pic();
                });
                var index = 0;

                function next_pic () {

                    index++;
                    if(index > 4){
                        index = 0;
                    }
                    showCurrentDot();
                    var newLeft;
                    if(wrap.style.left === "-4812px"){
                         newLeft = -1604;
                    }else{
                        newLeft = parseInt(wrap.style.left)-802;
                    }
                    wrap.style.left = newLeft + "px";
                }
                function prev_pic () {
                    index--;
                    if(index < 0){
                        index = 4;
                    }
                    showCurrentDot();
                    var newLeft;
                    if(wrap.style.left === "0px"){
                        newLeft = -3208;
                    }else{
                        newLeft = parseInt(wrap.style.left)+802;
                    }
                    wrap.style.left = newLeft + "px";
                }
                var timer = null;
                function autoPlay () {   //自动轮播
                    timer = setInterval(function () {   //定时器
                        next_pic();
                    },3000);
                }
                autoPlay();
                var container = document.querySelector(".container")
                container.onmouseenter = function () {
                    clearInterval(timer);
                }
                container.onmouseleave = function () {
                    autoPlay();
                }
                var allL =document.getElementsByTagName("s");
                function showCurrentDot () {
                    for(var i = 0, len = allL.length; i < len; i++){
                        allL[i].style.backgroundColor='#7f7f7f';
                    }
                    allL[index].style.backgroundColor='#fff';
                }
                for (var i = 0, len = allL.length; i < len; i++){
                    (function(i){
                        allL[i].onclick = function () {
                            var dis = index - i;
                            if(index == 4 && parseInt(wrap.style.left)!== -4812){
                                dis = dis - 5;
                            }
                            //和使用prev和next相同，在最开始的照片5和最终的照片1在使用时会出现问题，导致符号和位数的出错，做相应地处理即可
                            if(index == 0 && parseInt(wrap.style.left)!== -802){
                                dis = 5 + dis;
                            }
                            wrap.style.left = (parseInt(wrap.style.left) +  dis * 802)+"px";
                            index = i;
                            showCurrentDot();
                        }
                    })(i);
                }
            });

$(function(){
	$('.banCM-bottom').hover(function(){
		$('.banCM-bottom .banCR-span1').css('display','block')
	
	},function(){
	$('.banCM-bottom .banCR-span1').css('display','none')
	})
	
	$('.banCM-top ').hover(function(){
		$('.banCM-top .banCR-span2').css('display','block')
	
	},function(){
	$('.banCM-top .banCR-span2').css('display','none')
	})
	var  num = 0;
	var  timer;
	function abb() {
		clearInterval(timer);
		timer = setInterval(function() {
			num++;
			if(num > 7) {
				num = 0
			}
			$('.banCM-topUl li').eq(num).css('display', 'block').siblings().css('display', 'none')
			$('.banCM-topOl li').eq(num).css('background-color', 'red').siblings().css('background-color', '')
		}, 1000)
	}
	abb();
	$('.banCM-topOl li').hover(function(){
		 num = $(this).index();
		$('.banCM-topUl li').eq(num).css('display', 'block').siblings().css('display', 'none')
		$('.banCM-topOl li').eq(num).css('background-color', 'red').siblings().css('background-color', '')
	})
	$('.banCM-top ').hover(function() {
		clearInterval(timer);
	}, function() {
		abb();
	})

	var n=0;
	$('.banCR-span2').click(function(){
				n++;
				if(n>1){
					n=0;
				}
				console.log(n);
				$('.banC-right-ul').css('margin-left',-750*n+'px');
		})
			$('.banCR-span3').click(function(){
				n--;
				if(n<0){
					n=1;
				}
			$('.banC-right-ul').css('margin-left',-750*n+'px');
				
			})
		$('.banCR-mid-left span:nth-child(1)').hover(function(){
			$('.banCRML-ul').css('display','block')
			$('.banCR-mid-right').css('display','none')
			$('.banCR-mid-left span:nth-child(1)').css('background-color','white')
			$('.banCR-mid-left span:nth-child(2)').css('background-color','#E6E6E6')
		})
		
		$('.banCR-mid-left span:nth-child(2)').hover(function(){
			$('.banCR-mid-right').css('display','block')
			$('.banCRML-ul').css('display','none')
			$('.banCR-mid-left span:nth-child(2)').css('background-color','white')
			$('.banCR-mid-left span:nth-child(1)').css('background-color','#E6E6E6')
		})
		
		var  num1= 0;
		var  timer2;
	function aee() {
		clearInterval(timer2);
		timer2 = setInterval(function() {
			num1++;
			if(num1 > 2) {
				num1 = 0
			}
			$('.banCR-bottom-ul li').eq(num1).css('display', 'block').siblings().css('display', 'none')
			$('.banCR-bottom-ol li').eq(num1).css('background-color', 'red').siblings().css('background-color', '')
		}, 1000)
	}
	aee();
	
	$('.banCR-bottom-ol li').hover(function(){
		var w =$(this).index();
		$(this).css('background-color','red').siblings().css('background-color','')
		$('.banCR-bottom-ul li').eq(w).show().siblings().hide();
	})
	var q= $('.banCR-bottom-ul li').index();
	$('.banCR-bottomOl-sp2').click(function(){
			 q++;
			 if(q>2){
			 	q=0;
			 }
		$('.banCR-bottom-ul li').eq(q).show().siblings().hide();
		$('.banCR-bottom-ol li').eq(q).css('background-color','red').siblings().css('background','');
	})
	
	$('.banCR-bottomOl-sp1').click(function(){
			 q--;
			 if(q<0){
			 	q=2;
			 }
		$('.banCR-bottom-ul li').eq(q).show().siblings().hide();
		$('.banCR-bottom-ol li').eq(q).css('background-color','red').siblings().css('background','');
	})
	
	$('.banCR-bottom').hover(function(){
		clearInterval(timer2);
		$('.banCR-bottom span').css('display','block')
	},function(){
		aee();
		$('.banCR-bottom span').css('display','none')
	})
	
	/*$('.TabC-ul1 li:nth-child(1)').hover(function(){
		$('.book-ce').css('display','block')
		$(this).css('border','2px solid red')
		$(this).css('border-right','2px solid white');
		$(this).css('background-color',' white');
	},function(){
		$('.book-ce').css('display','none')
		$(this).css('border','2px solid white')
	})*/
	var p;
	$('.TabC-ul1 li').hover(function(){
		p =$(this).index();
		
		 function aoo(a){
	 	 return '.book-ce'+a
	 	}
		/*aoo(p);*/
		console.log(aoo(p));
		$(aoo(p)).css('display','block');
		console.log($(aoo(p)).css('display','block'))
		$(this).css({
			'border':'2px solid red',
			'border-right':'none',
			'background-color':'white',
		}).siblings().css({
			'border':'',
			'border-right':'',
			'background-color':'',
			
		})
	},function(){
			$('.book-ce').css('display','none');
			$(this).css('border','2px solid white')
	})
	
	
	 		
	$('.book-ce').hover(function(){
		$('.book-ce').css('display','block');
		$('.TabC-ul1 li').eq(p).css({
			'border':'2px solid red',
			'border-right':'2px solid white'
		})
	},function(){
		$('.book-ce').css('display','none');
		$('.TabC-ul1 li').eq(p).css('border','2px solid white');
	})
/*	$('.book-ce').hover(function(){
			$('.book-ce').css('display','block')
			$('.TabC-ul1 li:nth-child(1)').css('border','2px solid red')
			$('.TabC-ul1 li:nth-child(1)').css('border-right','2px solid white');
	},function(){
		$('.book-ce').css('display','none')
		$('.TabC-ul1 li:nth-child(1)').css('border','2px solid white')
	})*/
	var  m;
	$('.ban2-contentMR-ul1 li').hover(function(){
		clearInterval(timer3);
		$(this).css('background-color','red').siblings().css('background-color','#969896')
		 m= $(this).index();
		$('.ban2-contentM2-right img').eq(m).css('display','block').siblings().css('display','none')
	},function(){
		axx();	
		/*$(this).css('background-color','red').siblings().css('background-color','#969896')*/
	})
	var  timer3;
	var  project=0;
	function axx(){
		clearInterval(timer3);
		return setInterval(function(){
			project++;
			if(project>1){
				project=0;
			}
			$('.ban2-contentM2-right img').eq(project).css('display','block').siblings().css('display','none')
			$('.ban2-contentMR-ul1 li').eq(project).css('background-color','red').siblings().css('background-color','#969896')
		},2000)
	}
	axx();	

	$('.bookL-top>span').hover(function(){
		var bx=$(this).index();
		$(this).css('background-color','white').siblings().css('background-color','')
		$(this).css('top','3px').siblings().css('top','1px')
		$('.befordiv>div').eq(bx-1).css('display','block').siblings().css('display','none')
		$(this).css('border','3px solid black').siblings().css('border','');
		$(this).css('border-bottom','2px solid transparent').siblings().css('border-bottom','');
	})
		$('.bookL-top>span').hover(function(){
			$(this).addClass('spans').siblings().removeClass('spans')
		})
		
		$('.BookRc-ul1 li').hover(function(){
			$('.boox-ul1').eq($(this).index()).show().parent().siblings().children('.boox-ul1').hide();
			$('.BookRc-ul1>li>span:nth-of-type(2) ').eq($(this).index()).hide().parent().siblings().children('.BookRc-ul1>li>span:nth-of-type(2)').show();
		})
		
		$('.BookRc-ul2 li').hover(function(){
			$('.boox-ul1').eq($(this).index()-2).show().parent().siblings().children('.boox-ul1').hide();
			$('.BookRc-ul2>li>span:nth-of-type(2) ').eq($(this).index()).hide().parent().siblings().children('.BookRc-ul2>li>span:nth-of-type(2)').show();
		})
	/*	
		$('.BookRc-ul1 li:nth-of-type(2)').hover(function(){
			$('.BookRc-ul1 li:nth-of-type(2) .boox-ul1').css('display','block');
			$('.BookRc-ul1 li:nth-of-type(1) .boox-ul1').css('display','none');
			$('.BookRc-ul1 li:nth-of-type(2) .spns0').addClass('spns1');
			$('.BookRc-ul1 li:nth-of-type(1) .spns0').removeClass('spns1');
		})
		
			$('.BookRc-ul1 li:nth-of-type(1)').hover(function(){
			$('.BookRc-ul1 li:nth-of-type(1) .boox-ul1').css('display','block');
			$('.BookRc-ul1 li:nth-of-type(2) .boox-ul1').css('display','none');
			$('.BookRc-ul1 li:nth-of-type(1) .spns0').addClass('spns1');
			$('.BookRc-ul1 li:nth-of-type(2) .spns0').removeClass('spns1');
		})
			
		$('.BookRc-ul2 li:nth-of-type(2)').hover(function(){
			$('.BookRc-ul2 li:nth-of-type(2) .boox-ul1').css('display','block');
			$('.BookRc-ul2 li:nth-of-type(1) .boox-ul1').css('display','none');
			$('.BookRc-ul2 li:nth-of-type(2) .spns0').addClass('spns1');
			$('.BookRc-ul2 li:nth-of-type(1) .spns0').removeClass('spns1');
		})
		
			$('.BookRc-ul2 li:nth-of-type(1)').hover(function(){
			$('.BookRc-ul2 li:nth-of-type(1) .boox-ul1').css('display','block');
			$('.BookRc-ul2 li:nth-of-type(2) .boox-ul1').css('display','none');
			$('.BookRc-ul2 li:nth-of-type(1) .spns0').addClass('spns1');
			$('.BookRc-ul2 li:nth-of-type(2) .spns0').removeClass('spns1');
		})*/
		
		
		
		
		
		
	var timer4;
	var bookCont=0;
	function arr(){
		clearInterval(timer4);
		timer4=setInterval(function(){
			bookCont++;
			if(bookCont>1){
				bookCont=0
				$('.bookL-contentM-top img').eq(bookCont).css('display','block');
				$('.bookL-contentM-top img').eq(1).css('display','none')
				$('.bookL-contentM-topUl li').eq(bookCont).css('background-color','red')
				$('.bookL-contentM-topUl li').eq(1).css('background-color','black')
			}else if(bookCont=1){
				$('.bookL-contentM-top img').eq(bookCont).css('display','block');
				$('.bookL-contentM-top img').eq(0).css('display','none')
				$('.bookL-contentM-topUl li').eq(bookCont).css('background-color','red')
				$('.bookL-contentM-topUl li').eq(0).css('background-color','black')
			}
		},1000)
	}
	arr();
	
	var timer5;
	var bookCont1=0;
	function arr1(){
		clearInterval(timer5);
		timer5=setInterval(function(){
			bookCont1++;
			if(bookCont1>1){
				bookCont1=0
				$('.bookL-contentM-top1 img').eq(bookCont1).css('display','block');
				$('.bookL-contentM-top1 img').eq(1).css('display','none')
				$('.bookL-contentM-topUl1 li').eq(bookCont1).css('background-color','red')
				$('.bookL-contentM-topUl1 li').eq(1).css('background-color','black')
			}else if(bookCont1=1){
				$('.bookL-contentM-top1 img').eq(bookCont1).css('display','block');
				$('.bookL-contentM-top1 img').eq(0).css('display','none')
				$('.bookL-contentM-topUl1 li').eq(bookCont1).css('background-color','red')
				$('.bookL-contentM-topUl1 li').eq(0).css('background-color','black')
			}
		},1000)
	}
	arr1();
	
	var timer6;
	var bookCont2=0;
	function arr2(){
		clearInterval(timer6);
		timer5=setInterval(function(){
			bookCont2++;
			if(bookCont2>1){
				bookCont2=0
				$('.bookL-contentM-top2 img').eq(bookCont2).css('display','block');
				$('.bookL-contentM-top2 img').eq(1).css('display','none')
				$('.bookL-contentM-topUl2 li').eq(bookCont2).css('background-color','red')
				$('.bookL-contentM-topUl2 li').eq(1).css('background-color','black')
			}else if(bookCont1=1){
				$('.bookL-contentM-top2 img').eq(bookCont2).css('display','block');
				$('.bookL-contentM-top2 img').eq(0).css('display','none')
				$('.bookL-contentM-topUl2 li').eq(bookCont2).css('background-color','red')
				$('.bookL-contentM-topUl2 li').eq(0).css('background-color','black')
			}
		},1000)
	}
	arr2();
	
	var timer7;
	var bookCont3=0;
	function arr3(){
		clearInterval(timer7);
		timer5=setInterval(function(){
			bookCont3++;
			if(bookCont3>1){
				bookCont3=0
				$('.bookL-contentM-top3 img').eq(bookCont3).css('display','block');
				$('.bookL-contentM-top3 img').eq(1).css('display','none')
				$('.bookL-contentM-topUl3 li').eq(bookCont3).css('background-color','red')
				$('.bookL-contentM-topUl3 li').eq(1).css('background-color','black')
			}else if(bookCont1=1){
				$('.bookL-contentM-top3 img').eq(bookCont3).css('display','block');
				$('.bookL-contentM-top3 img').eq(0).css('display','none')
				$('.bookL-contentM-topUl3 li').eq(bookCont3).css('background-color','red')
				$('.bookL-contentM-topUl3 li').eq(0).css('background-color','black')
			}
		},1000)
	}
	arr3();
	
	$('.bookR-content-ul li').hover(function(){
		$('.bookRCU-img1').css('display','block')
		$('.bookRCU-img2').css('display','none')
		
	},function(){
		$('.bookRCU-img2').css('display','block')
		$('.bookRCU-img1').css('display','none')
	})
	
	$('.bookR-content>span:nth-of-type(2)').hover(function(){
		$('.BookRc-ul2').css('display','block');
		$('.BookRc-ul1').css('display','none');
		$(this).css('background-color','white');
		$('.bookR-content>span:nth-of-type(1)').css('background-color','#E5E5E5')
	})
	
	$('.bookR-content>span:nth-of-type(1)').hover(function(){
		$('.BookRc-ul1').css('display','block');
		$('.BookRc-ul2').css('display','none');
		$(this).css('background-color','white');
		$('.bookR-content>span:nth-of-type(2)').css('background-color','#E5E5E5')
	})
		/*$('.BookRc-ul2').css('display','none');
		$('.BookRc-ul1').css('display','block');
		$(this).css('background-color','#E5E5E5');
		$('.bookR-content>span:nth-of-type(1)').css('background-color','white')*/
		
	
	
	$('.costumeTable tr td').hover(function(){
		$(this).css('color','red')
		$(this).css('text-decoration','underline')
	},function(){
		$(this).css('color','black')
		$(this).css('text-decoration','none')
	})
	
	/* var costume=0;*/
	 var  timer10;
	 var w=0;
	 function azz(a){
	 	clearInterval(timer10);
	 	var tag=a+' .costumeCMR-headerLI-ul0 li'
	 	/*console.log(tag)	*/
	 	timer10= setInterval(function(){
	 		w++;
	 		if(w>4){
	 			w = 0
	 		}
	 		$(tag).eq(w).css('display','block').siblings().css('display','none')
	 		$(a+' '+'.costumeCMR-headerL-ul0 li' ).eq(w).css('background-color','red').siblings().css('background-color','#969896')
	 	},1000)
	 
	 }
		 azz('.costumeC-mid1');
//	 	azz('.costumeC-mid2');
//	  	azz('.costumeC-mid3');
//	  	azz('.costumeC-mid4');
//	  
	/* $('.costumeCMR-headerL-img').hover(function(){
	 	clearInterval(timer10);
	 },function(){
	 	azz()
	 })*/
	$('.costumeCMR-headerLI-ul0 li ').hover(function(){
	 	clearInterval(timer10);
	 },function(){
	 	/* azz('.costumeC-mid1');*/
		azz(hover1);
		console.log(hover1);
	 	/*console.log(azz(hover1))*/
	 })
	var  hover1='.costumeC-mid1';
	function axx(x){
		 hover1 = '.costumeC-mid'+x;
		/*console.log(hover1);*/
	}
	
	 $('.costumeCMR-headerL-ul0 li').hover(function(){
	 	var a = $(this).index();
	 	$('.costumeCMR-headerLI-ul0 li').eq(a).css('display','block').siblings().css('display','none')
	 	$(this).css('background-color','red').siblings().css('background-color','#969896')
	 	
	 })
	
	/*$('.costumeCT-spans-one').hover(function(){
		var h =$(this).index();
		axx(h);
		azz('hover1');
		$('.costumeC-zong .costumeC-mid1').css('display','block').siblings().css('display','none')
		$(this).css('height','51px').siblings().css('height','48px');
		$(this).css('border','2px solid black').siblings().css('border','1px solid #999999')
		$(this).css('border-bottom','2px solid transparent').siblings().css('border-bottom','1px solid #E3E3E3')
		$(this).css('background-color','white').siblings().css('background-color','#f5f5f5')
		$(this).css('color','#323232').siblings().css('color','#969896')
		$(this).css('font-weight','bold').siblings().css('font-weight','')
	})*/
	
	$('.costumeC-top-two>span').hover(function(){
		
		var h =$(this).index()+1;
		console.log(h)
		axx(h);
		azz(hover1);
		$('.costumeC-zong .costumeC-mid'+h).css('display','block').siblings().css('display','none')
		$(this).css('height','51px').siblings().css('height','48px');
		$(this).css('border','2px solid black').siblings().css('border','1px solid #999999')
		$(this).css('border-bottom','2px solid transparent').siblings().css('border-bottom','1px solid #E3E3E3')
		$(this).css('background-color','white').siblings().css('background-color','#f5f5f5')
		$(this).css('color','#323232').siblings().css('color','#969896')
		$(this).css('font-weight','bold').siblings().css('font-weight','')
		$('.costumeCMR-headerL-ul0 li').eq(h).css('background-color','red').siblings().css('background-color','')
		console.log($('.costumeCMR-headerL-ul0 li').eq(h-1))
	})
	
	/*$('.costumeCT-spans-there').hover(function(){
		var h =$(this).index();
		axx(h);
		azz('.costumeC-mid3');
		$('.costumeC-zong .costumeC-mid3').css('display','block').siblings().css('display','none')
		$(this).css('height','51px').siblings().css('height','48px');
		$(this).css('border','2px solid black').siblings().css('border','1px solid #999999')
		$(this).css('border-bottom','2px solid transparent').siblings().css('border-bottom','1px solid #E3E3E3')
		$(this).css('background-color','white').siblings().css('background-color','#f5f5f5')
		$(this).css('color','#323232').siblings().css('color','#969896')
		$(this).css('font-weight','bold').siblings().css('font-weight','')
	})
	
	$('.costumeCT-spans-four').hover(function(){
		var h =$(this).index();
		axx(h);
		azz('.costumeC-mid4');
		$('.costumeC-zong .costumeC-mid4').css('display','block').siblings().css('display','none')
		$(this).css('height','51px').siblings().css('height','48px');
		$(this).css('border','2px solid black').siblings().css('border','1px solid #999999')
		$(this).css('border-bottom','2px solid transparent').siblings().css('border-bottom','1px solid #E3E3E3')
		$(this).css('background-color','white').siblings().css('background-color','#f5f5f5')
		$(this).css('color','#323232').siblings().css('color','#969896')
		$(this).css('font-weight','bold').siblings().css('font-weight','')
	})*/
	
	var timer8;
	var costumeCb=0;
	
	function aqq(){
		clearInterval(timer8);
		timer8= setInterval(function(){
			costumeCb++;
			if(costumeCb>1){
				costumeCb=0
				$('.costumeC-bottom img').eq(costumeCb).css('display','block').siblings().css('display','none');
			}else if(costumeCb=1){
					$('.costumeC-bottom img').eq(costumeCb).css('display','block').siblings().css('display','none');
			}
			
		},500)
	}
	aqq();
	
		/*$('.sideNavigation ul li').hover(function(){
			$(this).css('width','80px').siblings().css('width','41px');
			$(this).css('background-color','greenyellow').siblings().css('background-color','#E7E7E7');
			$(this).children('span').css('display','block').parent().siblings().children('span').css('display','none')
		})*/
		
		$('.sideNavigation ul li').hover(function(){
				$(this).children('span').css('display','block').parent().siblings().children('span').css('display','none')
				$(this).css('background-color','greenyellow').siblings().css('background-color','#E7E7E7');
		},function(){
				$(this).children('span').css('display','none');
				$(this).css('background-color','#E7E7E7')
		})

			$('.sideNavigation ul li').eq(0).click(function() {
				var h=$('.book').offset().top
				$('html,body').animate({'scrollTop':h-100}, 500)
			});

			$('.sideNavigation ul li').eq(1).click(function() {
				var h=$('.costume').offset().top
				$('html,body').animate({'scrollTop':h-100}, 500)
			});

			$(' .sideNavigation ul li').eq(2).click(function() {
				var h=$('.merchandise').offset().top
				$('html,body').animate({'scrollTop':h-100}, 500)
			});


			$('.sideNavigation ul li').eq(3).click(function() {
				var h=$('.Babys').offset().top
				$('html,body').animate({'scrollTop':h-100}, 500)
			});

			$('.sideNavigation ul li').eq(4).click(function() {
				var h=$('.recommend').offset().top
				$('html,body').animate({'scrollTop':h-100}, 500)
			});
			
			$(window).scroll(function(){
				var h=$(window).scrollTop();
				if(h>200){
					$('.sideNavigationRight').css('display','block')
					
				}else if(h<200){
					$('.sideNavigationRight').css('display','none')
					
				}
				if(h>400){
					$('.headerTop').css('display','block')
				}else if( h<400){
					$('.headerTop').css('display','none')
				}
			})
			
			$('.sideNavigationRight ul li').eq(0).click(function(event) {
				$('html,body').animate({'scrollTop':0}, 500)
			});	






})