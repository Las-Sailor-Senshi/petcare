-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-02-2021 a las 04:34:42
-- Versión del servidor: 5.7.33-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carritos`
--

CREATE TABLE `Carritos` (
  `idCliente` int(11) NOT NULL,
  `idCarrito` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidadPiezas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Carritos`
--

INSERT INTO `Carritos` (`idCliente`, `idCarrito`, `idProducto`, `cantidadPiezas`) VALUES
(101, 401, 207, 1),
(101, 401, 208, 1),
(101, 406, 201, 1),
(101, 406, 207, 1),
(101, 406, 208, 1),
(101, 406, 209, 1),
(102, 402, 207, 1),
(102, 402, 208, 1),
(103, 403, 207, 1),
(104, 404, 207, 1),
(104, 404, 208, 1),
(104, 404, 209, 1),
(105, 405, 207, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE `Categorias` (
  `idCategoria` int(11) NOT NULL,
  `nomCategoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Categorias`
--

INSERT INTO `Categorias` (`idCategoria`, `nomCategoria`) VALUES
(1, 'Medicamentos'),
(2, 'Juguetes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `idVendedor` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apPaterno` varchar(45) NOT NULL,
  `apMaterno` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `Clientes` (`idVendedor`, `idCliente`, `nickname`, `nombre`, `apPaterno`, `apMaterno`, `correo`, `contraseña`) VALUES
(100, 101, 'jor', 'Jorge Luis', 'Perez', 'Blancas', 'dxdiag41@gmail.com', 'nxnxnxnx'),
(100, 102, 'sam', 'Samuel', 'Medina', 'Castro', 'xcxcxc@gmail.com', 'xcxcxcxcx'),
(100, 103, 'anto', 'Luis Antonio', 'Valdovinos', 'Barrera', 'sdsdsds@gmail.com', 'sdsdsdsds'),
(100, 104, 'gus', 'Gustavo', 'Desentis', 'Desentis', 'fgfgfgfg@gmail.com', 'fgfgfgfgfg'),
(100, 105, 'seb', 'Sebastian', 'Islas', 'Becerra', 'jojoj@gmail.com', 'jojojojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetallesOrdenes`
--

CREATE TABLE `DetallesOrdenes` (
  `idCliente` int(11) NOT NULL,
  `idDetalleOrden` int(11) NOT NULL,
  `idCarrito` int(11) NOT NULL,
  `subTotal` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DetallesOrdenes`
--

INSERT INTO `DetallesOrdenes` (`idCliente`, `idDetalleOrden`, `idCarrito`, `subTotal`, `total`) VALUES
(101, 501, 401, 255, 355),
(102, 502, 402, 255, 355),
(103, 503, 403, 200, 300),
(104, 504, 404, 274, 374),
(105, 505, 405, 200, 300),
(101, 506, 406, 284.25, 384.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Direcciones`
--

CREATE TABLE `Direcciones` (
  `idCliente` int(11) NOT NULL,
  `idDireccion` int(11) NOT NULL,
  `calle&num` varchar(100) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `delMio` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `codigoPostal` int(11) NOT NULL,
  `telefono_1` varchar(15) NOT NULL,
  `telefono_2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Direcciones`
--

INSERT INTO `Direcciones` (`idCliente`, `idDireccion`, `calle&num`, `colonia`, `delMio`, `estado`, `codigoPostal`, `telefono_1`, `telefono_2`) VALUES
(101, 301, 'Alheli 63', 'La planta', 'Iztapalapa', 'CDMX', 9960, '5510512399', '58506873'),
(102, 302, 'Alcanfor 18', 'El rosario', 'Tlalpan', 'CDMX', 45458, '5578914213', NULL),
(103, 303, 'Fresno 18', 'La polvorilla', 'Iztapalapa', 'CDMX', 15151, '5578914213', NULL),
(104, 304, 'Margarita 69', 'Pedregal', 'Iztapalapa', 'CDMX', 14144, '5578491544', NULL),
(105, 305, 'Pino 33', 'San angel', 'Tlalpan', 'CDMX', 25281, '5510512399', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ImagenesProductos`
--

CREATE TABLE `ImagenesProductos` (
  `idProducto` int(11) NOT NULL,
  `idImagenProducto` int(11) NOT NULL,
  `ImagenProducto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ImagenesProductos`
--

INSERT INTO `ImagenesProductos` (`idProducto`, `idImagenProducto`, `ImagenProducto`) VALUES
(211, 1, 0x89504e470d0a1a0a0000000d494844520000006f000000d60803000000e8de2cef000002fd504c54450807090c0b0c0c0a0c717171717171717171777777767676aeaeae717171ccbdc2717171dde0ddc3d7d7dee0ddbbbabab6b7b7bbbcbbbbd5d4e1e3e1d4d2d2dddddccecdcec4c5c4717171e0e2e1df98aee1e3e2babab9717171d7dbdae2bbc8e0e1e000a2c8bbbabab7b7b6d2d5d4b1b1afe1e4e2b4b5b3eb94af00a1c8b2b2b0b6b7b5e8b0c1cacfced4d8d5c5c3c400a2c8d1d4d200a2c8d4d5d4c4c3c3c8c8c600a2c800a1c700a1c7b1b2af00a1c7e4e6e5eaebebe7e9e8e2e5e4ebedededeeee717171d6d8d8d3d7d0e5e8e7e1e3e2d4d7d5d7dbd9fefeffd5dbd3d4d9d2e0e2e0d1d5cfd2d4d3e7e6e6dee0dfdce0ddd9d9d9dbdddcffb7c8cfd1d0fca9c4d9dcdaf5bfd2cdd0cdd7ddd6ff8bb6e7eeedf3c3d5cfd4cdf3b7cccbcecbc0c1bfbbbabaefc0d1ffa6c4ff98baff92b5f4bbcfffa0c2feadc8f7adc5ffb1c4f1c7d7f8b5ccff9abff2dae4f1cddbff65aaf1f0f1dbdfdaf9c2d5a7ada1f6b1c8efe7ecbdbebce3efedc3c4c1ff92bbfeccd9f6a8c1e2ebeafabcd1b8b9b6c8c8c7c5c6c4ffc6d9fca4c1f6c7d8f99fbdadb2a8f0d6dfc9cbcaff9ebdff8faeede5e9fdb6cee0f2f0eebccdfab2caffc0d6ff5b9fffb1bbf4f5f5edccd9ffb4bff5dbe600bcd6f6ceddff65a1eeb3c6030404ebdbe2ff89ad4b4e4f141b1aff7ba2dee9e6ffb1cbff79aaf3fbfadbefecead3dcecc6d4ece1e6b4b8b1ff84aaffa9bdf697b6e8f5f5ff85b2b1b5aeff6ba6d7f7f3f2e1e8fac7daffbbd2e7e0e5ff5fa5323636edaabf565a5bf5d4e0828585cedbdbff7eb0ff81a1e4dce0b5b4b49096963d4444fbd3e2ff71a9a0a2a1626666242526fdcedfea99b39a9b9ce2f9f6f5e8ee86d3e3a6a9aacfcccde3c1cd00acccef8eadceb4beff76a1c8ebefe5cad500b3d1c3babfd1a6b5b2e0ecd4d0d2e0adbe767979fddde9dd9eb38ea7a6d5ece8bec7c7abb0afb2c8c8ff53976a8685afbbbb7c9999feebf39bd9e75ec8ded8bec99cb7b7cae2e1e0d2d8dc86a5174647bf69833cc2dabfa8b1ed789ece7793a287928fc9c3b298a1c8839ae55c8895697a735562587e7d33ba1c000000003a74524e5301090fc0e88029435e655e99bffe8d9f163bfeee455a9e2ab09f5fd9f0d0b99f75dcdfc1aa77c8b09f5392d49f8aec9df5d68f6ce7c2a8a24deb6cc1dcd7000024754944415478da9c94cf6ea33010c69b3b45b4298aa24815872ab75da9ead16010f18012377840152a873e4478be3cdc7e33d9ee65b77fb49f3c381edbf3f36744aebed4224992d5eae64e956671bc5edf47db8b22d1fd5a14c771f694a658b34a16578babff50024a9a3e659940540ff7dbed66b3592e978c78d7e622e0150d70066ef27d108e074f30b38eb6523c10f13ccfcc331379efc3383287e0d13c7b6b2c9248f03cce3cf4e3802344eb0c4693ef4293348ee043589e2c4461183890fcf2e459aa07b03571c972409a746150e4268ab334f9ce0bbb115af04209e0a93c44a683191dfd3e86319db3844ed35e92981324b3a72590e9eacbb7963e6c70354cce59eb0344a430d497404d75e6ac709c33e07542b4bace76564f4340cef5eef133a0b8bf7b78fcc91e1c8fda408a1788c4d985671c892ca49d0117eb7485dc41d719ebb10dc16db34e3fe525d9edf599c940040f8514521ca40fa5624ab38450db8ad6a731450ed39064b98de2cfaf33bbbe3e0f1ea4c2883f1c5ea530b582c28521673c07425e5a274bf130e0c09f73aec873d9efe759798b0f3f04e5f53d7bc2eeaec8b1afc8cbfca252068852134e274aa8aa2a04743a957955e665a117e3799ea6285e7c48434b7e80d734f5d88e8148a0ce00a1840ac52a102a255ce2a41434e9abfc54d8dc5947f2350236ed0fca5b7c0404ef163c00cfe7ba6deb76083c580ace7972b9b525aae59531795510c216a7c214551e8ad27a5bd168789ae7fd341df67b69efbc7f0235fd8757d78db4b6ee871e3136a3fc77781e7182a9659e9a40733d5b9e26cf8791e7fd9ea71d48d06e2701200c8207e05f441d6366a53cd0fabe56deb1198fc7a63ebed6edcb4bb37f7e6eeaddebb1debdbdd5ede1f9172375901a310c4301b45768295dceaa27b1c142425eb884215998b9ff2dfa258f4d3c496833318859f8f115cb895030d71a592bc70a48a3a87bcc3cfa799e0fbfee15f772b8e74439835de90e6fd31a823e32495d0047090a4aaa0aab6e627523f1a0c43be79bbd395f7af1c8bc8a9cf02c564a5163aa3b2fa206c6d64aeba79173bef9eb99f7357bf4f4129ceec5d5bd806c7aee593080c6dee081bbcaf73e79c9bc9297704f6b0af0085e50f3d68548e1e8ec49f4d234ac8d5b3f2f34f7307fa1f8f71b5e4e7bafe89a0a3cc0cddbd8bc5ae10937cf45c474cf9f17ad93efdfe611b997c6f9ecfd24efe7d1c3cec38bd23cd4ccd23cdbfb34dfa779e5ee5e722ffca49c829f4f95ee113c14aa1275e729bb87b7851369ded93ce0bfd903e7e76578c877e9c9de6bf3ce58ddf3dd0fc3d7bd50a8f4f3b964cacda317afcc9e5e7a5701df262fccde637f3efd5a312fdbfeccbe746378a2c2d1499b42f77ac00366deedbf9e9662d6f06a8527c3eb574cf30e9aade67dccfd1cf767f77cde67afe793c963f7fecc07af3cf3510a05e7332fb9ddd7faf41e99c0d0f0ecdedcdc6308f09c94e3fc1dc95f46cca6b589280ac3e8c2451035a02d8288685c899150bb103f169338439ac4a4d3e132a14826821b05c10f4c4389996c6aa00822282e7451444154822e5d4837aedcb8175c881bff85cf39b799884e8a6f3b1f6dd3fbcc7bee3df7ceb9992d7f9e6779defff1aa7ff3b8684a94d3fdd9018b0e48ff49f2798bca73241fc6bce02f5e0d961d9f80129e9a53816b6eeb0f1efe8cefc353732e3c4ff32f18e783ac7fae91fe83b7a03cbc298fb816c5af9d3f596d6f99f2f6fd07ef27ef67be311cbe21b08c174d7b78219ccb2dd7657cfac5b0bae8d474998505831bfcd18f0b4d967a034bd4ac4e1d9f9c2cef470d0cd5025582dff05dcf775ddfb881617e71e038aced4e63017f18d78e228878592872946ff102c35b605d2a0c78c5566e2e993f53fd15a21f6140103d0f8b3e485fcb21e355ea8ba65ef716a53caa577c4385e4d7eb544d48ca052ef2631d8a31f81395f3b9ccecb6fd97dd335fc8d790232f461a574ec66b1a8223375836fa181cf61e40e3960d9fb238281df09c2f1c3eb97fdf8ea9fe54b39923070f17f279c7d0a0f154ac14367b75a5771d91c78d5b2cba0e7fb051959b264312342ecbf9dd3373d99d3b6972ba3fb453aa676acddd415875a41b2b527ba08604d5f17d7d003935918c412ed65d0371e117b5309f3b909dddb5135eaa3d681607d0ea64d46f47dd78d80a2f57c907a46ba2f13d6b0f5e59a55831472a542fb786f1a01bf547f3196d659abf64024d78c70fadddb973676d6df4fa75bfdf89badd01ec56180441c8d95e553c510b4637ea74fafdd7a335f9b7cf9ff76615062e3138cd9f10b3c78ff5f9d7442311e889fa1cc96fec4741253a3137b1975e404cfcedca66664ecbc35a01129eb6b7ad3edb8b7dbef9b9ecec3ee1a513156679b373b9d3dd81c4278a387538446d1ec05253c80ab1677aa02fa13d344f3224c365aabf7d077285388e87c3adbe1aa27880e409da40119e132e103044968781d4eeb43bddb815c67cf8e8fcc9ecd8dd94fe03b77b381886359779cc26a0bc36d502cb8ea1221d1a96ac207584a241cc0092c5d03841dcd9dc3c3493b5f9feafb764fe8c6399cf7cd9d01131c9f860e1d6c0863a28e318ac1521d7a33b202055329e5c5439416bd0d93cb3379bd84bf3379b63d483a3ceacc8a600d29372c9666348c226b9564d54b42b9d67981a26db161556cd61b73d3a732a93e60fbc5663470a0371e7d03615bce8ec96c6b7da1ed2b36ccb94ceabce21adbab967eb4078a4657b74f4d83483683fd1149cc11ebcb309aea43a3f116d236a79d54dea772b80104b17ebac9ae17010b53747e9feacbd7cab054ea7cdc4df040646c58601084b9a48a13c02bb1317a8bb1d053268d25242713b3233df820077d883275d27bcc496e571ba7b6e6c0c80c5f225d2cd11ec551abe0790b4e86fa6272038786e0d9e67d49f382cb179a390445b4e7b2bcbd2fef283951e70be41a96463e62c2b0a401a8ba3767f9c8269fe5c97700af04f1e8eecb7c07abd95070f5696d79fdd7fbabafaf4fe87f5e5959e3a4fe24d38131e39d14ea371a83f6a3eadfae081d33d26418a497545d31b202fdd587db8b4f4f8f1e3a587ab4fd67b1b25a4fdac11509e0d686b1075920529cddf1f3ce9bcb14a34b3b1f1f2cbbb5fdf5f5d7f78fbded235608f544babeb2f37c69f6473900f33aed98eb41d28bcb46cb0fd4728a96d0967c29be4dfcbf7cb1fefddbbf2f5ed8babcf3f3dbffae691027f336a6e4f695c711c7fed74a6d3191ffbd2d73e74a67f00172123093399acd148da2e99366697eee6b228e344e936c44b62955b95d238a508080b9601dd82452825784104831d938926934c62a2891a33136d92c93d4da7bf5d0cf54afb75b3d9b32c7cf89edff9fdced9d560f0d8377e1d000be279e0b0b2c0db44045a81074ba0b55226dbc013cbdc5a510bfef4d593e987af677a667a860cfaefc1223083dfb74097aec3014fc63fe6dd03b755057f40d9bcfae479e5791ae0f8b7aee104c8e40096b43c4e2cafe49e3fbb702cc01183d0abc00c1e9810f904eb25ce03f71fdcf7d9d73bf803f1bc7f9fa202adc093e94adb8850adedafbfe74ae6e2f1e7bf396666667a00c8f100d8a515883739dccb1751e06d9bef6bfdb9bb122e03e5cb8ae82d0f716b8d7acb62f2e16c66ce3d1e73c52f0702ccd0cc8c21780070e782c16f8cebed21080704de7e9ec76b6bf8f23c59a184e5d31bc69b5b6034231de9c528fa2aee72aecca55c6f089a65867a7a7a54c7f2318cfc2e72af07f25d2a96eddf55f0b725050b3c40adabcef055dd6522f371c662a94dde5e066fcb4baed4f367436820d03313d0038db3f88d4827d8287e9056ece40fc4f30e9643dcf22a143044a72d232cd1da68e8e6ea5236353a17733d7af457201000838e20d08057b789c71509442cdb53dcdf27fb2a36f284229d5b57660ed7b0c0ab7dfdbc642e313ab7e48c3d7af4e8cd531480013df803605dd9167f90fbe20ac8879dfdbdf3c98d0d3c2108eaa5ce6c2643d1686df259626ee5ee9cd49971665d76fb9ba70c0055c1733bf2ca38de167ff954ccf3aa2af6428ddec0530a756623150d456bd9db73cba309672c351b77b95c59e852e019d678c83a9ef82d4fb6e7cbc3d55bf38f6bf1bcf7ab2a64600fe1c4cf0bbc7cbe6ed4525b5b9bee2c594ab9ec312930a5e3f75e8c1886667a1cfa736be385cbd60d2ae3fced58af79dec52dbc52a1c837dfcd723c5be4e212f4632c313e9aa8deab2b59b8095526c0f30e004f04120806b7e7f19eb6fabbb86bafb870f99a3f9196f70742af833f5756ba30bfa7a9fadbd1b969d51a2f1851e77948317f5be307bc72c8bf4d3ca1b28df7174d5e985b5eca38a50bed232f5f4e8d2e4f3998357f3f028de76d1a9f7bda0bf1836dabbff6dd9b79b0ab97a8d13ceff6d4c2c272dc29cdc49f8fdc9b5a4e3ce5c60b244464d0579cb775bd54e00936f26079625422948de3d1d7734f46fe4e65edf6ecf8f99285a5f8b31ec61084e88de9e6a1d8426d58373c8127105714f797e7211b784a2162d67ad216e051d3afae372ea562b1587c65b564e56fe7e31946f5fdb90313f54644542a81520408e0e471055e91f871fd29d8c00395f9cc13e822d433f4e6ed0777463399a5e59585d592e547b1c74c407fecc0ef2291df2f52ab91320e019c3cee7ff9db550e73d1261e2cfe84a4c5561bb55db871e5cee3c7b9e59592555fc9922bfb1a35901e6c382c138b742715833a24ef8fffc5ae7f030fb46dfe018f8b002724cfe3c74cb897b52c46a93f4b5e4c3dbc3cbdf2e245c995d595a5bf5eab5a2648b6262c9bf7f5a20ebf9673e68689897799e715af2f791e2202713b1ec6fd0bfb0e3116f4f8f96b2f5fa1fa070b2be3530b57aeac5e7228944622dd621687c58a1903c2f1c4f36e88a21b6846a358b6d5dfd6fc130b44dcdd0150de1a845b02adc8a3b83afdf0a92dcdf6dd6cbefeecf1cbf393938387daccbdaa74cba43bfc239326753eae2f7d3aa3b1cc0ddd3900bc5dfffadbbebe000f2207048d572e977b256bc8fad2b07bd783878b8b96da34936419cbe2225a275bf52b7dc751a6a5df67f62c262784da32a1100189ca06b920ba75ee5d3bc56f5d7f960abebc9b1b9f6a6cde23825b9e52dedf1f126d78fe52924b8a68d46281c9c962ebbbb8aae99ff7b0e8c4a4f977749190d42bcbbaeb07226791e11f8e233af7bc7b7078f77fc6af522647722928cbaeac33f1b555ee2d1509f3b75a56eb2d0f1bb2e46563153f8bbc72af8f60e8de30cc8fa14fc33aede00975579240be6b3d5a661684c5278edc683f7cad78fc2a87e583a3808bc19cea8acd564be41a2b2f8d153af87e274660184d912d637e0dd7e1663a8dc9c2c6a48530867d3598e3748b851aa0f136f364a9f204d37aa3047845e3c7f3b2f6d454d5781cb0cea9526b05ff44a0aabdf1f0799f57d3dbab56ffa19198cd726bf9d7ef8950c6a335d7d96c9d5d468448b3186123c658a2bead7be047d486df28b9532cffa0be5496cb05e0cfd9609588aba52e7b76ca3aca55b054429acda6a455d6c6dc3daf5c3b3a2e9337385d991b68d23429a4d20c81136334739664928489c04856f58587668f9cff8ff835edabdc9be735cb41bba4767bbc319e4d65128984d39ecac0bc9e73a646c767b3d2dd77a5317b7c9a45cf4efe984ea3aa004bd2b8ba83a1291c23d024da8a5275e5ab4dd7b6cfbf2dbcc372a1c02affd269cfcea6e25342b9bcdae9ba5b2ecdc612317b0cc653e68e339ecbcc3e61e86e9d279aa655b80ac54e1f3a8953288beb29022302986efe7cd3b522f1dbc49395ca0509bb2b93ca8cc05839ec748dc877a5ec1998ff125230ea1c9524a44f184ad846db92344be9d14e756b47844da2497202c74d54876ef8ea45e015891ff086e5c81a4fe895efcbd85d52f0576ed5343a5d53b2f1543693491c3ef8753c93488d5b6733d719d2ea615814273c04639a089cee825006884e94c5b0933fff70b51d78c5e357e049345e4dc2654fc17049dc6d6a80e12a4d404e2632b31a39022663b323cef8ed80e73e1af2608aceb38a2405b5bb344977eab9ce5561a77efbb9b2fdda74b1fc6b86052fcf8b57c170f97216c667e26ed6eeccccce26e230adc7db85b938f0649994d31583bb97db2839960e8d757d7aeac4a7268c88e87c5f1c5293673a30cc839187ba2b9b1aaa8bc60f787cfc52e3cd77134e48fbd18aaa983d1b4b3967a1e5724e35cca6a412f94127074bc49c0f718c0cb1c2c9ee23c7d58335678dca328139dcdddb5b53d3565757d35d01e3b358fc789e18f2dde58c67ed900c2312b90406a513e29571393329387226385e7c343e224fbc7948516c92d4fadc6649bd0e16c635357e7338ec438cfec1faae2357f735158b5f8117032bb048494ced83aa2969c8e5b8fafd4baea962643c379e6bb4ca85b9f18bd532f97b4f2ed3c910d5e6f3b96181a6440ee12a8250d429cddd6dea815b5d6dc3bbef3414cb3f3e7e1aa42191914a13b96621c45002e55a82c05f3f894badd0b48a840857381191959bb06e11492865fdf0ac849b36fd7538934e2655a6df07d4b7eedfea4664c02b1abfe6aa8af241a3b0146a34147fab849fdfc1637fbf5502730520360878b645f696d7c8af4110ad524ddb5896e9e9d068eedf1f1896eddfd7dc50347e77aa3edf2f1369ac5e6f7fbfb75fa9e5a5ecef9f34f7f79b27cdca7e007bf95d5ef789450b79dfab737312bb7d61c87d0b13508c69acf588d8bdbfea4ec3bd22f1037f07f7bacb8c422d4444a7e36066737eaf549ae74570ebe2d39a7ddc09785ed73f39594f5ad263de499f4f0b97eb04be302c2c6c2866aa932807753a31f8ab6e2c967f0f2ef5767773c11e3082ea376940ede71f46d6d71b611bf0ebcc039e107bab5e64340e70971bfd7ee500491391965fbbfd6aa3bfadf7ea83e9e99de3f7c1477d384e518ad30a150aa241b0cbef61a34ed72968fe3cff2a46a1349aac4dd3344ead09aea1505e344ee3c4c9a367fafa2e6c1bbf359e834987d228a90ad940d1a88d97c506cd10ac21708c85c65b316938958637584051cb9aa2a174286a89726da695a2518763c7f8014fe56018963aa9a0709ca6f316299a41491425185b12c5e1db830b9422492a99446996c6e044325abb9da2eca953ad7d7d7d3bc78fe7a56992c4280aa708824e5227689aa0f13314a148dbd0244b784882a050e28b93ad30afc2f72128e25432ba0e08b71905de51ae3ffb8ac54f1560d214a9a27114c7309260883a6e62696da530326da3c1e5e92fc0388b1f3dd54a91844ad507d13eca426f6f516d28c4920af07779c7fc039e01fa538fdb1cfa0016d19f21f58a0e870a0abd09d77b0233fa884715ec5019e047afd7e37ad2a3c72294dea4e29edd6d230306bccb978bc40f788180c1d113700ca9f406f8608321e0c00d2adc61c00301955e35e4802b400e4e2afe1507ee18da5e068200dce51deb27f070954ae530047103fccf1d0393177c3038e2f8701e8736c8919701b68061b3b8ef04b51b0760b1f86120826ce98c7476b6b4b474c20682238f6962028ede3623f0ba093b83710ae685c156f8c90b2349087d6b91f87dfc95c7e3214df089dfb4f03c100f3045265a38d4afd05e3b1739f61f52447efdf5d3ef7efa69e7f8bdfbe111d301d30150a433027b7813b7e34ec06ec3a1091a6b3ac7692b2e78ae6ea0abe6eaa54b3be61ff0fe61dd7a5a2427a2f877f0e0d52fb0dfc05915d1ab7bd0a260a6a84375ba3a4555a79050c3e066824c12429c74d2873084d01eb66593465ac1fe034d23f4a12f3dec80832383e2e0a2171184f90abec655f6a0f1e29b99744f25cccb7bbff7fbfd2605cdd37491eeffeeff11c3ed0e0accfe1d3fa88fcc1f3f7ebc6f6708c77d3cfe3be6f3c7f0db0ede95f00dd7bd14bb17af672faf6db7db39cbb27fc50ff235855e5f5c388e032ee1c01bf8da07bcfc04ab70d8873399c111165e8afdd9170bfbabfffcd9ae75737dddc2bf07d70d99cfe7dba11f9773f0a5d9c56e78b6ddaed7e56eb75bc7db6d2cddedae2ccf16f3ddb65cff15e53c1d5e1c3b6139bb7274b876e60bdf2db743b02579fdfbef6dfa59652ccc51ba70b1764e9f9e1e3bae3d7687700bae3b0f65e82aa3e6a58bfa1dac754864184ae2fadca0f11cae54fafc2254ae9bda39595facc7fdce98deddddb5f16f55b1504c13b7a4f5003c7ca6994168bc707d1f8721672641beab79b72b28639c73cc29151d233c39d249976e36d81664dc47cdf2cd63474551e0dd3dbf6ce11fe4c3aecc0223e3c9a8d6ae2d2ade3bec090fd9aa2cb1e7511c6a2a78218565d9be6f84324839c7a5268687cea41628f77ae3f8e4c409899e8ce8f4dbcbcb36fc5622cf89a49ed1926395a734d38b9ecb56410fb9ae80fb28b414e6fc28f6adc35eea071ecdf37c3e8783d2076faded043b2ac7718c7d5f9f3e7b787d09fedec2bf07c28350a1488c302e699c186e529f8f32d1eb8d4d94bb61c19491c733ad5584c60a0aa679affbe9977d7f1d3bb371b75f7eb1254ca24f3ae1e49d0d0c6775d9a69f0f605ea81775026493a2a947e57ab959cea437350a2a4c31c16e1aa932c44a09a438930d47492f19ef7e9a2ddfd341d211681ceafaa0b4532951406fbf7ee5e68736fe654c12eaf582e4a3f09d66f3d08d4f1ae9f08a1a84503a74315e8ca14a638cca7d521412c309d14baf3e3c5ad6caeaf834b28ce1275facb1ac91658a1f6f7e78dea29faf664661172baffb99ff90c4e7647490222c97a7e21091f962e19314799ea8a81bbab829489e447ea8fa09d671a950eefb8a52db8af4e084d583919b3368e7b76df82141f9b837f572bb7c4f8e4eeb827713a2631975835c413ffd688a72c54948dc7941a1814a33cff834537662f5912212fbb9b72a8e96f78f06235ebf7dd38e9f910d55a91279182f4775c1b8428bad234564242c52d4ed062966c07d827d8502db0fa5f170c1680e5ed70904c798101e89f2619d2d27acb9fff879dbff2fafddbf1e03d33f4c2d2ae3e3308a687cfcdb4fc735cde341edfbf6e1771f0d816b0b573734b090bb2b438352b76864087a13e651841485990a82b8b4b1c45e7407f5b5e0f7a86eeaa783322c6a91f8980ecb385e9725c9f4f981d6e744400b5322e767aef04076ce7667ca334092426b427c9507873dcc3926dc461ddb2d4975f7fb5d1bff5e2db2e68d77348d4f36a21bb0d16cb2dc6c0a11f0e544ead1795cbfcb023b4ffdd4f63cc3fdc522158668e9ba84e70848d4e97608c1586ad7eaa6a325b9fd06f2b5f99f488b477c5c8c6216ce0d996cf64f3ccbe450d5858963ba76809304f57b49445956ad2a4f285917c44f01cabe654410094ee6675213d4e35f3dc5f5fdeadbcfdbf8e705390e90c6a8379cf73afc3acb364b9c74a711e28006c781ef22a5ba5695516fb5aa56c60fb130d0dc7c3f3e01327ba2da90d44dcd7294b3ebd5f336febd5645bdd4d03ff3f53f12d799c17960c4f4534b11ac5c7faf991c1f4659e5413e0fea535e84c48a12c6d49e4c5404410053e3a69d340f507577f37d8bffbdd6085bd7853e3e26e5b6278ae5b367381044fa76e4c5137975c5966f6a134dbd2aaa6e1b6175a7abd5ca980aca85b49830d0278c31946a251d0bba02f96edaf0cb902d9fbceb4f603f85eb7a3371dc0e02e7c3981ad630e7bcd624f3a6979751956502d9a682a6364d46e96adaed51cc9a46caa6d14444f00429eeefaf6f7e68d3cf071542f4c953b7d8c4abd5f26459760e2d1582833389ab159411da164cc9e534ca28ea232c1b58658c1a4ec1c90ce774efc19c4846a36e22bffaf903c8d7e67f9456553d380a032ff2a873157a91f17d423083c0743aed7752be175804320a145004c61475028f4c9e3ca987985a7d5bbddfb1029f48298bbafef1975f7f6dc1ef01282190d7195b15552605e9a58c71c00502b256911528686f9876042b1aae08179c10591445bdd98c9c496175911b6bb0e08b879b3215687507f5b5e0e756d9040739124d11f2e0f0d3beca328671c318e494928995519861a59acd1bb7453ca25315c32ec8600992169f9f8cfc24d0478389c417936208123e05acdbf8473ccf4701877224012868a7ef55d825fb601019ab2a63722327cbdbac38fdea2844a678ef14f64a0627073327cb668b04cb6242a24000108a57ffc13f06636dab7d1315f8416a3a563751003fd498651967fb598c82703289ebd1d1e05d5dc69b2627f1043ed976bef6bd95e601d7ce044f13043a8b49b6827eb63c3f6481d551dc08db46a8071b1cb0f36d19d2b08c7208487a7bcba3a82c7dbc7c3618353c1e0c8885f6a7c2f9c21642785eee7c310be97811160d66505f2b7ed5f4d08a02b0ce240079f272114da39443ba7d404e28922ac035e1b7b799bf3e78fae816ef81b63c311ea7e082bdfe5414b3ab0be1612022682cf8d18b74ff84df1fa49bcf8bd3401886d143ed45c47b4e0925d01e3ce8add196a25510ad4ad142c0563c8960113136883605a18228e22f16f1a2781044c48a97bdec4af1a265150411bca8158a20f82ff8cc978e06272d62df7467d36c928777926dc3ccfbbdbb7b82b35e446778763ec933e7d18bcf97da6d6eee36bfda3cb2dc5a7e7efcf811be8b8f5e1abd797365387832b8fee0fa70b8d45eee2f5dbf7ee6cc99e1f73d7b8697fafd7b2b1faeddd5f70b00f3fa6d79fbe9e0cafe2b5e80cae520e0a546b6825180547b05b152beda79b43c082e1c58198c3acf3ac1e834637b3b1fdd3975ebe7e1fb2fee0d02527604058a2b7cc0bc9f3d7f0baf513d402da5effb25bf24f13cc60859532af196c6671bdaeedfdc1eadbd5a5d5d9d4cbe7d9d8cc7f5fed9c7b77f3cfdfc590dce8ec7cdd365dfdb557d1b7e34fd094d78972fd777ef121e44255f460235cf17791d9a8eff70fbe5f12bb4369e4cd65eaf3596cf3ebef1eee94b04f175c894daf65a755e7e025e14c1236cf95b20caa3d11438e5953c4c9318f48a7beb2d82ad6fc9097eddf8e54afffcd2a0d28b48ac5eee8555a60e8b07f6e97c8822a4e47b7abdc6c1df3c4fe61ac18d80081b8b6ce3e51303905de2a01fc2b0bac41e07777c4f0ef4761c22c50b4f94561cb0755bd8acee6504597838e2b0007b3e126620f94b2f167bc8dc20b391aa6500d6970d0fe587a9d55aa5191eeb1afe74f10ac02ddb7afb0e153d4848ba5021ffd6d45b52f14eb47a05eb7b0fd609b8dab3fd0174cf352bb5229dc121005182a3c989a469da3ebc55e5beb58a8a7f3a396dcfa4a1ac133699c32daab9f02951013446f30cc9e6f81a9485b6f770b519b52c279b31fcad4ba6e7b37648f9d4215547af234ca584ad741e129447a3e2c23b6a2a0e4df6d3cdeafa0e08a63f94c9d9ada8a143c31239c5abe64a07ceb027c6a0eda0c245254dc37385fce679817d0d74ec6dbd48e5e7291c834b958c8009e268b2293888d8602d4e4247a155707319707369488a1fac564844bd17292cdc2adc44485af2739c3b29a95b9f8676e9c996e5662927d13470a917501740e4f28e75ecd8312a1200834dd84564600fa1c394412ab185d50a5963c58a80d94e3ebb19dcbcde64d13c94c9e6dd42c1068a04acfd8aa0d71b12ded7a26a2152350b966d3b6e4e79d3b899f5cc2849cc6cc8c1b4ba5dbe03ba7fa860436963e90d2d29ceb06c377666e0521d6a1ec418b9399bcb6f721d8c7629b5809a2655fb61d905c7cde773c092340d3469883f240d269982c42a66bb5aab22562c81c1daa0509af69b67c00c7fb1c50564d04ca2f96fb16e719cd999e63dba2051c366df9a465079816e95039238bdccf2675c4739c5ffc1cc329254aca9f5b2cce5c862486873888643039bbe98d227d2b4b98af75e481af7affe84b9000b99acb960396e016bbaf967e202fa67ca2f76cbde44621888c2b538dccc6ce05da682d7e134a054810a99600221500952e8066e64c345f2a1e56c70b05f60060bf4314fe8e7f19a663a8b797a3dfeb4bd273a9be97dac7bd2153c8774d70b1f7415fd45fcc7daad884ac74c67b7970b35543f6870a11e15b9cd878c86308c98c880d36d848918b03a79c017eab10cc7a90e4a0ac7f022c28c28117ef3a16c266e52e4f67512ca70a03375292824adb1c0ccc410228fdd8744a1f914c15bb311e528cf79dc67bda987321ae6cb5cb1fb3c6285335f4115085500be0efb26ea931191e9b7bf46dd7cb100be80d5218696b1d60ca4d13c17eac35b70bb2f31f2ea5cda7d265a052cf0317a54c9abb8be6ff9643f78c4cd6a086fb985dd472c643edf1c8c1060e4a3fd301e68629b4fb991b4d5cc6abfadda07f782d9f4b2528fe916e7d909e7f52d2e88e76deedb4bde135fbefc544b76296e04311056a39f46e802f3d287a9fb5f2a250d8b1dc89ab04e96a4301ab5e4d63725e6ff94b67c31194975ac25a95b28d7602c4d696d2dc6a59a4a31de8a29ab32044f0ca3fa150fd003d862323c852970c4bb26016c62e60fd49aa3a3d8bd79d609fbd593facd3a8dae9fcf789c7a5093500a9765d83e337400170cb7c1eae2745d469390879c010b66583386f73ee3f182defef2998748342f60fc09d57e5742e5f6f7cc33b6c67ac17f9347f9ecd3607d136a56bc57b8b6617fd85724bbad074f0bd66743e6ecfe35efc2f5d82765c1419ba9f341b72d9d7672aedd18eac15ba7f98951bee47919019d50d1fb3cf0e6c5d8dc0e65e3c3a0a109772d1f3c596cb059eeb4fa9247693019ede6051004498ccd9b5428b90d614da4f4c1bb3f6592285e18de3f2bfafa56b9cb376a5d6615a95485b644d270ade9ea3c96c6ee425cab7cca5fe75d55959b4958c77552b6ed5567baa88e852dd725cb5214d9e5aff3b4dc65407ee359ea91431758f49b60378c48d163f116cf61b7076b4ac2972098a90f2fb5f9203c60abcb65eb1d9e84a25191473b5ee7279e9cdc26cf3c517d8b275ec7845af714ecd3ab6418de36dbf2b44f67e66ff02addd392d3d376b68df0b37858374f9af2f85eda76d83b3c83116454d2cb41b2c652c8cd1b610f3f10b3e67c6b9fe51d2326ee29ad90bfa7bde58fea076cefea7465f906940000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ordenes`
--

CREATE TABLE `Ordenes` (
  `idOrden` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idDetalleOrden` int(11) NOT NULL,
  `idDireccion` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estatus` varchar(45) NOT NULL DEFAULT 'Pendiente',
  `numGuia` varchar(60) DEFAULT 'Sin guia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Ordenes`
--

INSERT INTO `Ordenes` (`idOrden`, `idCliente`, `idDetalleOrden`, `idDireccion`, `fecha`, `estatus`, `numGuia`) VALUES
(601, 101, 501, 301, '2020-12-21 00:00:00', 'Finalizado', '15987463'),
(602, 102, 502, 302, '2020-08-19 00:00:00', 'Finalizado', '15985221'),
(603, 103, 503, 303, '2020-12-21 00:00:00', 'Finalizado', '58149581'),
(604, 104, 504, 304, '2020-12-21 00:00:00', 'Finalizado', '51958584'),
(605, 105, 505, 305, '2020-08-19 00:00:00', 'Pendiente', '18488956'),
(606, 101, 506, 301, '2021-01-22 00:00:00', 'Pendiente', 'Sin guia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `idCategoria` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `nomProducto` varchar(200) NOT NULL,
  `precio` float NOT NULL,
  `stock` int(5) NOT NULL,
  `descripcion` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Productos`
--

INSERT INTO `Productos` (`idCategoria`, `idProducto`, `nomProducto`, `precio`, `stock`, `descripcion`) VALUES
(1, 200, 'Paraguard 205ml', 98.2, 25, 'Anti-parasitario para peces'),
(2, 201, 'Pelota roja', 10.25, 11, 'Pelota mediana para perro'),
(1, 202, 'Neoplex 10 grs', 150.45, 15, 'Antibiotico'),
(2, 203, 'Pelota verde', 10.25, 45, 'Pelota mediana para perro'),
(1, 204, 'Focus 5grs', 15.99, 98, 'Antibacteriano'),
(2, 205, 'Pelota con sonido roja', 20.99, 55, 'Pelota mediana con sonido para perro'),
(2, 206, 'Pelota con sonido azul', 20.99, 99, 'Pelota mediana con sonido para perro'),
(1, 207, 'Ergoferon', 200, 14, 'Tratamiento de infecciones respiratorias'),
(2, 208, 'Juguetes para masticar', 55, 13, 'Kid de juguetes para masticar'),
(2, 209, 'Kong classic chico', 19, 99, 'Juguete de goma no toxico'),
(1, 210, 'SulfaPlex', 100.5, 16, 'Tratamiento contra infecciones bacterianas'),
(1, 211, 'DermaVetNat', 330, 10, 'Suplemento alimenticio para perro que ayuda mejorar la piel y pelo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vendedores`
--

CREATE TABLE `Vendedores` (
  `idVendedor` int(11) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apPaterno` varchar(45) NOT NULL,
  `amMaterno` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Vendedores`
--

INSERT INTO `Vendedores` (`idVendedor`, `nickname`, `nombre`, `apPaterno`, `amMaterno`, `correo`, `contraseña`) VALUES
(100, 'Gus', 'Luis Gustavo', 'Desentis', 'Desentis', 'nodoyhermana@gmail.com', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Carritos`
--
ALTER TABLE `Carritos`
  ADD PRIMARY KEY (`idCliente`,`idCarrito`,`idProducto`),
  ADD KEY `fk_Carrito_Cliente1_idx` (`idCliente`),
  ADD KEY `fk_Carrito_Producto1_idx` (`idProducto`);

--
-- Indices de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_Cliente_Vendedor_idx` (`idVendedor`);

--
-- Indices de la tabla `DetallesOrdenes`
--
ALTER TABLE `DetallesOrdenes`
  ADD PRIMARY KEY (`idDetalleOrden`),
  ADD KEY `fk_DetalleOrden_Carrito1_idx` (`idCliente`,`idCarrito`);

--
-- Indices de la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  ADD PRIMARY KEY (`idDireccion`),
  ADD KEY `fk_Direccion_Cliente1_idx` (`idCliente`);

--
-- Indices de la tabla `ImagenesProductos`
--
ALTER TABLE `ImagenesProductos`
  ADD PRIMARY KEY (`idImagenProducto`),
  ADD KEY `fk_ImagenProducto_Producto1_idx` (`idProducto`);

--
-- Indices de la tabla `Ordenes`
--
ALTER TABLE `Ordenes`
  ADD PRIMARY KEY (`idOrden`,`idCliente`,`idDetalleOrden`,`idDireccion`),
  ADD KEY `fk_Orden_Direccion1_idx` (`idDireccion`),
  ADD KEY `fk_Orden_Cliente1_idx` (`idCliente`),
  ADD KEY `fk_Orden_DetalleOrden1_idx` (`idDetalleOrden`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_Producto_Categoria1_idx` (`idCategoria`);

--
-- Indices de la tabla `Vendedores`
--
ALTER TABLE `Vendedores`
  ADD PRIMARY KEY (`idVendedor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Carritos`
--
ALTER TABLE `Carritos`
  ADD CONSTRAINT `fk_Carrito_Cliente1` FOREIGN KEY (`idCliente`) REFERENCES `Clientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Carrito_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `Productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD CONSTRAINT `fk_Cliente_Vendedor` FOREIGN KEY (`idVendedor`) REFERENCES `Vendedores` (`idVendedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `DetallesOrdenes`
--
ALTER TABLE `DetallesOrdenes`
  ADD CONSTRAINT `fk_DetalleOrden_Carrito1` FOREIGN KEY (`idCliente`,`idCarrito`) REFERENCES `Carritos` (`idCliente`, `idCarrito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  ADD CONSTRAINT `fk_Direccion_Cliente1` FOREIGN KEY (`idCliente`) REFERENCES `Clientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ImagenesProductos`
--
ALTER TABLE `ImagenesProductos`
  ADD CONSTRAINT `fk_ImagenProducto_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `Productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Ordenes`
--
ALTER TABLE `Ordenes`
  ADD CONSTRAINT `fk_Orden_Cliente1` FOREIGN KEY (`idCliente`) REFERENCES `Clientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Orden_DetalleOrden1` FOREIGN KEY (`idDetalleOrden`) REFERENCES `DetallesOrdenes` (`idDetalleOrden`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Orden_Direccion1` FOREIGN KEY (`idDireccion`) REFERENCES `Direcciones` (`idDireccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD CONSTRAINT `fk_Producto_Categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `Categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
