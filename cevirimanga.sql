-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Kas 2024, 08:32:26
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cevirimanga`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `kullaniciAdiSoyadi` varchar(60) NOT NULL,
  `kullaniciSifre` varchar(50) NOT NULL,
  `eklenenBolumSayisi` int(11) NOT NULL,
  `kullaniciRol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `kullaniciAdiSoyadi`, `kullaniciSifre`, `eklenenBolumSayisi`, `kullaniciRol`) VALUES
(1, 'Enes Burak Dikici', 'aaa123', 0, 'admin'),
(2, 'Muhammed Hür Baykara', '97344926', 0, 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE `bolum` (
  `id` int(11) NOT NULL,
  `adi` varchar(70) NOT NULL,
  `ikinciAdi` varchar(70) NOT NULL,
  `bolumAdi` varchar(70) NOT NULL,
  `bolumSayisi` double NOT NULL,
  `cevirmen` varchar(22) NOT NULL,
  `editor` varchar(22) NOT NULL,
  `eklenmeTarihi` datetime NOT NULL,
  `tur` varchar(7) NOT NULL,
  `renkBilgisi` varchar(7) NOT NULL,
  `yas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`id`, `adi`, `ikinciAdi`, `bolumAdi`, `bolumSayisi`, `cevirmen`, `editor`, `eklenmeTarihi`, `tur`, `renkBilgisi`, `yas`) VALUES
(36, 'Chainsaw Man', '', 'Köpek ve Testere', 1, 'huro.li', 'huro.li', '2023-12-03 20:42:17', 'Manga', '', '17'),
(37, 'Chainsaw Man', '', 'Pochita\'nın Olduğu Yer', 2, 'huro.li', 'huro.li', '2023-12-03 20:44:57', 'Manga', '', '17'),
(38, 'Chainsaw Man', '', 'Tokyo\'ya Varış', 3, 'huro.li', 'huro.li', '2023-12-03 20:46:30', 'Manga', '', '17'),
(54, 'Bocchi The Rock', '', '', 1, '', '', '2023-12-03 22:16:01', 'Manga', '', '13'),
(55, 'Bocchi The Rock', '', '', 2, '', '', '2023-12-03 22:17:39', 'Manga', '', '13'),
(56, 'Bocchi The Rock', '', '', 3, '', '', '2023-12-03 22:18:30', 'Manga', '', '13'),
(65, 'Kuma Kuma Kuma Bear', '', '', 1, '', '', '2023-12-04 13:44:26', 'Manga', '', '13'),
(66, 'Kuma Kuma Kuma Bear', '', '', 2, '', '', '2023-12-04 13:48:20', 'Manga', '', '13'),
(67, 'Kuma Kuma Kuma Bear', '', '', 3, '', '', '2023-12-04 13:51:00', 'Manga', '', '13'),
(73, 'Jujutsu Kaisen', '', '', 1, 'Waifu Avcısı', 'Waifu Avcısı', '2023-12-04 17:54:57', 'Manga', '', '16'),
(74, 'Jujutsu Kaisen', '', '', 2, 'Waifu Avcısı', 'Waifu Avcısı', '2023-12-04 17:56:15', 'Manga', '', '16'),
(75, 'Jujutsu Kaisen', '', '', 3, 'Waifu Avcısı', 'Waifu Avcısı', '2023-12-04 17:57:02', 'Manga', '', '16'),
(134, 'One Punch Man', '', 'Yengeç ve İş Arama', 2, '', '', '2023-12-04 20:40:30', 'Manga', '', '13'),
(135, 'One Punch Man', '', 'Tek Yumruk', 1, '', '', '2023-12-04 20:43:05', 'Manga', '', '13'),
(138, 'One Punch Man', '', 'Felaket Varlık', 3, '', '', '2023-12-04 20:48:32', 'Manga', '', '13'),
(325, 'Solo Leveling', '', '', 0, 'Enluess', 'Enluess', '2024-02-13 19:23:55', 'Webtoon', '', '15'),
(326, 'Solo Leveling', '', '', 1, 'Enluess', 'Enluess', '2024-02-13 19:24:33', 'Webtoon', '', '15'),
(327, 'Blue Lock', '', '', 1, 'huro.li, shizuku, Ethe', 'huro.li, Ethereal', '2024-02-13 19:25:14', 'Manga', '', '13'),
(328, 'Blue Lock', '', '', 2, 'Ethereal, huro.li', 'Ethereal', '2024-02-13 19:26:06', 'Manga', '', '13'),
(343, 'Blue Lock', '', '', 3, 'Ethereal, huro.li', 'Ethereal, huro.li', '2024-02-14 15:19:51', 'Manga', '', '13'),
(344, 'Charlotte', '', '', 1, 'Ethereal', 'Ethereal', '2024-02-14 16:23:47', 'Manga', '', '13'),
(345, 'Charlotte', '', '', 2, 'Ethereal', 'Ethereal', '2024-02-14 16:24:06', 'Manga', '', '13'),
(346, 'Charlotte', '', '', 3, 'Ethereal', 'Ethereal', '2024-02-14 16:25:26', 'Manga', '', '13'),
(349, 'Solo Leveling', '', '', 2, '', '', '2024-02-26 17:39:46', 'Webtoon', 'Renkli', '15'),
(353, 'Vagabond', '', '', 1, 'huro.li', 'huro.li', '2024-03-09 20:08:16', 'Manga', 'Renksiz', '17'),
(354, 'Vagabond', '', '', 2, 'huro.li', 'huro.li', '2024-03-09 20:12:20', 'Manga', 'Renksiz', '17'),
(360, 'Haikyu!!', 'Haikyuu!!', '', 1, 'huro.li', 'huro.li', '2024-03-09 20:35:23', 'Manga', 'Renksiz', '13'),
(361, 'Haikyu!!', 'Haikyuu!!', '', 2, 'huro.li', 'huro.li', '2024-03-09 20:37:07', 'Manga', 'Renksiz', '13'),
(364, 'Saiki Kusuo No Nan', '', '', 0.1, 'huro.li', 'huro.li', '2024-03-09 21:53:03', 'Manga', 'Renksiz', '15'),
(365, 'Saiki Kusuo No Nan', '', '', 0.2, 'huro.li', 'huro.li', '2024-03-09 21:56:17', 'Manga', 'Renksiz', '15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `manga`
--

CREATE TABLE `manga` (
  `id` int(11) NOT NULL,
  `adi` varchar(70) NOT NULL,
  `ikinciAdi` varchar(70) NOT NULL,
  `konusu` varchar(2000) NOT NULL,
  `tur` varchar(7) NOT NULL,
  `renkBilgisi` varchar(7) NOT NULL,
  `puani` varchar(4) NOT NULL,
  `durumu` varchar(12) NOT NULL,
  `yas` varchar(3) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `eklenmeTarihi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `manga`
--

INSERT INTO `manga` (`id`, `adi`, `ikinciAdi`, `konusu`, `tur`, `renkBilgisi`, `puani`, `durumu`, `yas`, `kategori`, `eklenmeTarihi`) VALUES
(36, 'Chainsaw Man', 'Testere Adam', 'Denji\'nin basit bir hayali vardır; sevdiği kızla vakit geçirerek mutlu ve huzurlu bir hayat yaşamak. Ancak Denji, yakuza tarafından ezici borçlarını ödemek için şeytanları öldürmeye zorlandığından, bu gerçeklerden çok uzaktır. Evcil şeytanı Pochita\'yı bir silah olarak kullanan Denji, biraz para için her şeyi yapmaya hazırdır. Ne yazık ki, yararlılığını yitirmiştir ve yakuza ile anlaşmalı bir şeytan tarafından öldürülür. Ancak olayların beklenmedik bir şekilde gelişmesiyle Pochita, Denji\'nin ölü bedeniyle birleşir ve ona bir testere şeytanının güçlerini bahşeder. Artık vücudunun bazı kısımlarını testereye dönüştürebilen Denji, yeni yeteneklerini düşmanlarını hızla ve acımasızca yok etmek için kullanır. Olay yerine gelen resmi şeytan avcılarının dikkatini çeker ve Kamu Güvenliği Bürosu\'nda onlardan biri olarak çalışması teklif edilir. Artık en zorlu düşmanlarla bile yüzleşebilecek olan Denji, basit gençlik hayallerine ulaşmak için hiçbir şeyden vazgeçmeyecektir.', 'Manga', 'Renkli', '8.74', 'Devam ediyor', '17', 'Aksiyon, Macera, Ödüllü, Doğaüstü', '2023-12-03 21:20:00'),
(38, 'Jujutsu Kaisen', '', 'Gözlerden uzakta, asırlardır süregelen bir çatışma devam ediyor. \"Lanetler\" olarak bilinen doğaüstü canavarlar gölgelerden insanlığa terör estirmekte ve \"Jujutsu\" büyücüleri olarak bilinen güçlü insanlar onları yok etmek için mistik sanatlar kullanmaktadır. Lise öğrencisi Yuuji Itadori, efsanevi Lanet Sukuna Ryoumen\'in kurumuş bir parmağını bulduğunda, kendini bir anda bu kanlı çatışmaya katılırken bulur.\r\n\r\nParmağın gücünden etkilenen bir Lanet tarafından saldırıya uğrayan Yuuji, kendini korumak için pervasızca bir karar verir ve bu süreçte Lanetlerle savaşma gücü kazanır ama aynı zamanda farkında olmadan kötü niyetli Sukuna\'yı bir kez daha dünyaya salar. Yuuji Sukuna\'yı kontrol edip kendi bedenine hapsedebilse de, Jujutsu dünyası Yuuji\'yi yok edilmesi gereken tehlikeli, üst düzey bir Lanet olarak sınıflandırır.\r\n\r\nGözaltına alınan ve ölüm cezasına çarptırılan Yuuji, Jujutsu Lisesi\'nde öğretmen olan Satoru Gojou ile tanışır ve Gojou, idamının yaklaşmasına rağmen onun için bir alternatif olduğunu açıklar. Sukuna için nadir bir araç olan Yuuji ölürse, Sukuna da yok olacaktır. Bu nedenle, Yuuji Sukuna\'nın diğer kalıntılarını tüketirse, Yuuji\'nin müteakip infazı kötü niyetli iblisi gerçekten ortadan kaldıracaktır. Dünyayı daha güvenli hale getirmek ve hayatını biraz daha uzun yaşamak için bu şansı değerlendiren Yuuji, Tokyo Prefectural Jujutsu Lisesi\'ne kaydolur ve sert ve acımasız bir savaş alanına balıklama atlar.', 'Manga', 'Renksiz', '8.53', 'Devam ediyor', '16', 'Aksiyon, Doğaüstü', '2023-12-03 21:21:56'),
(42, 'Bocchi The Rock', '', 'Lise öğrencisi Hitori \"Bocchi\" Gotou\'nun gitarını saymazsak ne sosyal bir hayatı ne de bir arkadaşı vardır. Enstrümanını kullanmanın sosyal konumunu yükselteceği umuduyla bir okul grubu kurmayı hayal ediyor. Ancak son iki yılını özenle gitar çalışarak geçirmesine rağmen hedefine yaklaşabilmiş değil.\r\n\r\nPopüler şarkılara yaptığı gitar cover\'larıyla internette bir takipçi kitlesi edinmiş olsa da, Bocchi\'nin sosyal beceri eksikliği, hayalinin nihayetinde imkansız olabileceği anlamına geliyor. Ancak bir gün davulcu Nijika Ijichi, Bocchi\'yi gitarıyla bir parkta tek başına görür. Çaresizce bir gitariste ihtiyaç duyan Nijika, Bocchi\'yi hemen Nijika\'nın basçı Ryou Yamada-Kessoku Band ile kurduğu gruba dahil eder. Bocchi bu ani sosyal etkileşim karşısında şaşkına dönmüş ve bocalamış olsa da, bunun daha büyük bir şeyin başlangıcı olabileceğini fark eder.', 'Manga', 'Renksiz', '8.32', 'Devam ediyor', '13', 'Komedi', '2023-12-03 22:14:00'),
(46, 'Kuma Kuma Kuma Bear', '', 'On beş yaşındaki Yuna, okula gitmek de dahil olmak üzere başka herhangi bir şey yapmaktansa evde kalmayı ve saplantılı bir şekilde en sevdiği VRMMO\'yu oynamayı tercih ediyor. Tuhaf yeni bir güncelleme ona aşırı güçlü yeteneklerle birlikte gelen türünün tek örneği bir ayı kıyafeti verince Yuna yıkılır: kıyafet dayanılmaz derecede sevimli ama oyunda giyilemeyecek kadar utanç verici. Ama sonra birden kendini oyunun dünyasına sürüklenmiş, canavarlarla ve sihirle yüzleşirken buluyor ve ayı kostümü sahip olduğu en iyi silah haline geliyor!', 'Manga', 'Renksiz', '7.43', 'Devam ediyor', '13', 'Aksiyon, Komedi, Fantezi', '2023-12-04 11:33:01'),
(57, 'One Punch Man', '', 'Sıradan Saitama, üç yıl boyunca sıkı bir eğitimden sonra, tek bir yumrukla herkesi ve her şeyi alt etmesine olanak tanıyan muazzam bir güç kazandı. Bir kahraman olarak yeni becerisini iyi bir şekilde kullanmaya karar verir. Ancak canavarları kolayca yenmekten çabuk sıkılır ve kahraman olma kıvılcımını geri getirmek için birisinin ona meydan okumasını ister. Saitama\'nın inanılmaz gücüne tanık olan bir cyborg olan Genos, Saitama\'nın çırağı olmaya kararlıdır. Bu süre zarfında Saitama, Kahramanlar Derneği\'nin bir parçası olmadığı için ne hak ettiği tanınmayı ne de halk tarafından tanınmadığını fark eder. Şöhretini artırmak isteyen Saitama, onu öğrenci olarak alması karşılığında Genos\'un kendisine kaydolmasına karar verir. İkisi birlikte, güçlü düşmanlar bulmayı ve bu süreçte saygı kazanmayı umarak gerçek kahramanlar olma yolunda ilerlemeye başlarlar.', 'Manga', 'Renksiz', '8.75', 'Devam ediyor', '13', 'Aksiyon, Komedi', '2023-12-04 15:16:07'),
(77, 'Blue Lock', '', 'Japon Futbol Federasyonu, Japon futbolunun mevcut durumu üzerine düşündükten sonra, Dünya Kupası\'nı kazanma hayallerini gerçekleştirmek için esrarengiz ve eksantrik koç Jinpachi Ego\'yu işe almaya karar verir. Japonya\'nın gole aç, egoist bir forvetten yoksun olduğuna inanan Jinpachi, Japonya\'nın dört bir yanındaki liselerden üç yüz yetenekli forvetin izole edildiği ve birbirleriyle karşı karşıya getirildiği hapishane benzeri bir tesis olan Mavi Kilit\'i başlatır. Mavi Kilit\'ten sağ çıkan tek kişi milli takımın forveti olma hakkını kazanacak, yenilenlerin ise takıma katılması sonsuza dek yasaklanacaktır.\r\n\r\nBu riskli projeye katılmak üzere seçilen Yoichi Isagi, lise futbol takımını ulusal turnuvaya taşıyamamış bir forvettir. Kendi başına gol atmak yerine kaçıran bir takım arkadaşına pas vermeyi seçtikten sonra, daha bencil olsaydı sonuçların farklı olup olmayacağını merak etmekten kendini alamamıştır. Yoichi, Mavi Kilit Projesi\'nin verdiği bu altın fırsatı kullanarak şüphelerini gidermeyi ve nihai arzusunun peşinden gitmeyi hedefliyor - dünyanın en iyi forveti olmak ve Japonya\'yı Dünya Kupası zaferine taşımak.', 'Manga', 'Renksiz', '8.53', 'Devam ediyor', '13', 'Ödüllü, Spor', '2024-02-13 19:11:51'),
(78, 'Solo Leveling', '', 'On yıl önce \"Kapı\" ortaya çıktı ve gerçek dünya ile büyü ve canavarlar alemini birbirine bağladı. Bu iğrenç yaratıklarla savaşmak için sıradan insanlar insanüstü güçlere sahip oldular ve \"Avcı\" olarak tanındılar. Yirmi yaşındaki Sung Jin-Woo da böyle bir Avcıdır, ancak E-Rank\'a kıyasla bile acınası gücü nedeniyle \"Dünyanın En Zayıfı\" olarak bilinmektedir. Yine de annesinin hastane masraflarını karşılamak için düşük rütbeli Gates\'te yorulmadan canavar avlamaktadır.\r\n\r\nAncak bu sefil yaşam tarzı, Jin-Woo\'nun -korkunç bir şekilde yanlış giden bir görevde ölecek tek kişinin kendisi olduğuna inanarak- üç gün sonra bir hastanede uyandığında önünde yüzen gizemli bir ekran bulmasıyla değişir. Bu \"Görev Günlüğü\" Jin-Woo\'nun gerçekçi olmayan ve yoğun bir eğitim programını tamamlamasını ya da uygun bir cezaya çarptırılmasını talep etmektedir. Başlangıçta görevin zorluğundan dolayı uymakta isteksiz olan Jin-Woo, kısa süre sonra bunun kendisini dünyanın en korkunç Avcılarından birine dönüştürebileceğini fark eder.', 'Webtoon', 'Renkli', '8.67', 'Bitti', '15', 'Aksiyon, Macera, Fantezi', '2024-02-13 19:16:21'),
(81, 'Charlotte', '', 'Görünüşte Yuu Otosaka sadece çekici ve zeki bir genç gibi görünse de, bir sırrı vardır - insanların zihinlerine girme ve bir seferde beş saniye boyunca bedenlerini tamamen kontrol etme yeteneğine sahiptir. Yuu bu yeteneğini yıllardır en yüksek notları almak için kullanmaktadır ve bu sayede prestijli bir liseye girebilmiştir.\r\n\r\nEsrarengiz Nao Tomori, Yuu\'yu gücünü kullanırken yakalayınca, onu ve kız kardeşi Ayumi\'yi doğaüstü yeteneklere sahip öğrenciler için bir okul olan Hoshinoumi Akademisi\'ne geçmeye zorlar. Nao liderliğindeki okulun öğrenci konseyi, güçlerini kötüye kullanan ergenleri gizlice takip etmekle görevlendirilir. Yuu, öğrenci konseyine katılmaya zorlanır ve birlikte, onu kendi eksik görünen yeteneğinin hayal edebileceğinden daha güçlü olabileceğine dair şok edici gerçeğe yaklaştıran zorlu zorluklarla karşılaşırlar.\r\n\r\nAngel Beats ve Clannad\'ın yaratıcısı Jun Maeda\'nın orijinal hikayesi Charlotte, bu gençlerin doğaüstü yaşamlarını ve özel olmak için ödemeleri gereken bedeli keşfediyor.', 'Manga', 'Renksiz', '7.77', 'Bitti', '13', 'Drama', '2024-02-14 16:19:50'),
(84, 'Vagabond', '', '16. yüzyıl Japonya\'sında, Shinmen Takezou hem görünüşü hem de eylemleriyle vahşi ve kaba bir genç adamdır. Saldırgan doğası ona köyünün ortak kınamasını ve korkusunu kazandırmış, onu ve en iyi arkadaşı Matahachi Honiden\'i taşra hayatından daha büyük bir şey aramak için kaçmaya yönlendirmiştir. İkili zafer özlemiyle Toyotomi ordusuna yazılır ancak Toyotomi, Sekigahara Savaşı\'nda Tokugawa Klanı karşısında ezici bir yenilgiye uğrayınca arkadaşlar canlarını zor kurtarır.\r\n\r\nİkili ayrıldıktan sonra Shinmen, Matahachi\'nin hayatta kaldığını Hon\'iden ailesine bildirmek için kendi tayin ettiği bir görevle eve döner. Bunun yerine kendisini aranan bir suçlu olarak bulur, şiddet geçmişine dayanarak arkadaşının sözde cinayetiyle suçlanmıştır. Yakalandıktan sonra bir ağaca asılır ve ölüme terk edilir. Gezgin bir keşiş olan seçkin Takuan Soho, \"şeytan çocuğa\" acıyarak Shinmen\'i gizlice serbest bırakır ve yetkililer tarafından takip edilmesini önlemek için ona yeni bir isim verir: Musashi Miyamoto.\r\n\r\nVagabond, Japonya\'nın en ünlü kılıç ustalarından biri olan \"Kılıç Azizi\" Musashi Miyamoto\'nun hayatının, \"Göklerin Altında Yenilmez\" olmaktan başka arzusu olmayan bir kılıç ustasından, yavaş yavaş yakın arkadaşların, kendini düşünmenin ve hayatın kendisinin önemini öğrenen aydınlanmış bir savaşçıya yükselişinin kurgusal bir yeniden anlatımıdır.', 'Manga', 'Renksiz', '9.25', 'Bitti', '17', 'Aksiyon, Macera, Ödüllü', '2024-03-09 19:13:28'),
(91, 'Haikyu!!', 'Haikyuu!!', 'Düdük çalıyor. Top kalktı. Bir kazı. Bir set. Bir smaç.\r\n\r\nVoleybol. İki takımın karşı karşıya geldiği, duvar gibi zorlu bir file ile ayrıldığı bir spor.\r\n\r\nSadece 170 santimetre boyundaki \"Küçük Dev\", yüksek filenin ve engelleyici duvarın üstesinden geliyor. Hayranlık uyandıran Shouyou Hinata, asın kargaya benzeyen figürüne bakıyor. Küçük Dev gibi yükseklere ulaşmaya kararlı olan küçük boylu Hinata, ortaokulun son yılında nihayet bir takım kurmayı başarır ve ilk voleybol turnuvasına katılır. Ancak takımı, \"Sahanın Kralı\" olarak adlandırılan dahi ama baskıcı setçi Tobio Kageyama\'nın liderliğindeki güçlü okul Kitagawa Daiichi\'ye karşı ilk maçlarında tamamen yenilir.\r\n\r\nHinata, Kageyama\'dan resmi bir lise maçında intikam almak ve Küçük Dev\'in izinden gitmek için Karasuno Lisesi\'ne kaydolur; ancak spor salonunun kapısını açtığında Kageyama\'yı takım arkadaşlarından biri olarak görünce planları suya düşer.\r\n\r\nŞimdi Hinata, eksikliklerinin üstesinden gelmek ve lise voleybol dünyasının zirvesine çıkma hayalini gerçekleştirmek için takımda kendini kabul ettirmek ve sorunlu Kageyama ile birlikte çalışmak zorundadır.', 'Manga', 'Renksiz', '8.85', 'Bitti', '13', 'Ödüllü, Spor', '2024-03-09 19:29:02'),
(102, 'Saiki Kusuo No Nan', '', 'Kusuo Saiki tipik bir lise öğrencisi değildir; gözlüklerinin, pembe saçlarının ve anten benzeri uzantılarının ardında akıl almaz psişik güçlere sahip bir varlık vardır. Telekinezi, ışınlanma ve astral seyahat ortalama bir insana heyecan verici gelebilir, ancak Saiki\'nin bakış açısına göre bunlar can sıkıntısından başka bir şey değildir. Psişik güçler gereksizdir - Saiki\'nin çocukluğundan beri inandığı tek şey budur.\r\n\r\nTek hayali sıradan bir hayat yaşamak olan gizli bir esper olarak Saiki, psişik yeteneklerini halkın gözünden uzak kalmak için kullanmaya çalışır. Ancak, bir yandan psişik güçlerini gizli tutarken bir yandan da tuhaf sınıf arkadaşlarını ve onların maskaralıklarını temizlemek zorunda kalmak, arzuladığı huzurlu hayata ulaşmasını oldukça zorlaştırır.', 'Manga', 'Renksiz', '8.30', 'Devam ediyor', '15', 'Komedi, Doğaüstü', '2024-03-09 19:49:32');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bolum`
--
ALTER TABLE `bolum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `bolum`
--
ALTER TABLE `bolum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- Tablo için AUTO_INCREMENT değeri `manga`
--
ALTER TABLE `manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
