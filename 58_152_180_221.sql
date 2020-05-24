-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 58.152.180.221
-- 產生時間： 
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `hochilltrip`
--
CREATE DATABASE IF NOT EXISTS `hochilltrip` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hochilltrip`;

-- --------------------------------------------------------

--
-- 資料表結構 `attraction`
--

CREATE TABLE `attraction` (
  `attractionID` int(11) NOT NULL,
  `googleId` varchar(128) CHARACTER SET utf8 NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `lon` decimal(10,7) NOT NULL,
  `img` mediumtext CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `businessHour` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `countryID` int(11) NOT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- 傾印資料表的資料 `attraction`
--

INSERT INTO `attraction` (`attractionID`, `googleId`, `name`, `lat`, `lon`, `img`, `phone`, `address`, `businessHour`, `rating`, `countryID`, `duration`) VALUES
(8, 'ChIJPZXTUy_8AzQRBVRH5GyvszU', 'Hong Kong Disneyland', '22.3129670', '114.0412820', 'CmRaAAAAnJJxllXEB_dEmADVE3i6qu7M_AXmtRtJ8IbvShEKKuRibDOM9f5qmRqWfzXqkqkbnBGx6l-N_FBWy984bTN03eucbaAgC-Js900ibugkFV7Z1XBsdpwK0FO5ap1dG2Q7EhC9-RCxfEE1uiL8sl3T8HJ1GhT7iszJFFdgeLWFT_kLad2gKaydYg', '+852 3550 3388', 'Lantau Island, Hong Kong', NULL, 4.4, 1, 28800),
(9, 'ChIJiUims8d4A2ARo0TmrvWKD50', 'LEGOLAND Japan Hotel', '35.0503350', '136.8463700', 'CmRaAAAA91o2XGfMr3tzcfgI4Wxz7IKiXLp6QQVaKEE-1HCoWTSTUvq4Ipe6A8XeHpSoDt0bdPdwY8VFddd34M9VeHPFB-ajfMto1_jfh5KYOcmdbKq2vHEufyYV8Cq6orc1XW11EhBpTTZGhZ7nuwWg0ggqmVYmGhRvXOBl8TKXlOUdWT2smLDvxVYkFg', '+81 570-058-605', 'LEGOLAND Japan Hotel, 2-7-1 Kinjoufutou, Minato-ku Nagoya-shi, Aichi 455-8605, Japan', NULL, 4.2, 3, 7200),
(10, 'ChIJ__8_NJHoAGARNHDjdayadr4', 'The Park Front Hotel at Universal Studios Japan', '34.6676720', '135.4368970', 'CmRaAAAA-eeO0c6ZEAca1-jzUeUvke3b7azoBY51JtO_xGbatqnDphzTE90nqj-SZ-m3713taHQwW13pkcjZw_kzVYzJQ7GaQ892HhjesdShNySAakhk_xqQROveUJ0iMei3rcXEEhCaFZCl8nBz1eI5KWKQH6LwGhQxORY8kjBKAMJF_35XnA0LkZSR6w', '+81 6-6460-0109', '6 Chome-2-52 Shimaya, Konohana Ward, Osaka, 554-0024, Japan', NULL, 4.5, 3, 7200),
(11, 'ChIJfxblyrbpJIgRQJRSUpWqq74', 'Royal Park Hotel', '22.3798380', '114.1884930', 'CmRaAAAAGqDUCuFRSwdNiHTt5Wv472QWsVfcbNKhGo43LOAGUqTmbKUDejAxG5DBupM6kL6Df2qPqp0IVsuY1TmbClItgUkiXU0_9MvPkgJplPGwFEWbcf6vkKtS1Vumjg7PbWbQEhCpHLs2OFK4fUJGkDXYDbVxGhRzr800L1fn0s5ajYEU_N4iepsiDQ', '+1 248-652-2600', '8 Pak Hok Ting St, Sha Tin, Hong Kong', NULL, 4.1, 1, 7200),
(12, 'ChIJncZGzPPiAzQRnjaSGIKQ9fk', 'Hong Kong International Airport', '22.3080470', '113.9184810', 'CmRaAAAAD0OUyc2QOKCfNdoBn13kwRxAsAeQSp9cyD5CjrjlgKNVQDQh7jyX1ExcYzfY-EvzSfXtzNKGFqLS3jPzm-CEqinLuuVKW1drz3w_dE8zdLugLyLrViqVwpIbhM67qXNSEhARR2hcsoS4ZSHG-FOkNIGWGhRyvrcPQkwKUejA9e6O1rfc-m1B3Q', '+852 2181 8888', '1 Sky Plaza Rd, Chek Lap Kok, Hong Kong', NULL, 4.1, 1, 7200),
(17, 'ChIJZ18SMF9YATQR7q9-0iqqAmY', 'Grand Hall of Ten Thousand Buddhas, Po Lin Monastery', '22.2555020', '113.9078670', 'CmRaAAAATXr8MXTaZlynJCMtfey_zXPXTyqZQHPtzbfrnfIgsnoGlFOzDUtEYVm_wMzHfToEGW3_hypYFBklRjOue3AGwjLmkbqPdcRIkUuvE5wiXR-f3X7hxKlkQ_eZCnkNt_2sEhA1hUl47MICdM0ReFgA2rsTGhRgRue-dNHabGCDY_k4onZliXY6SA', '+852 2985 5248', 'Ngong Ping, Hong Kong', NULL, 4.6, 1, 7200),
(18, 'ChIJP9fVNl9YATQRPBvErn2e8zI', 'Po Lin Monastery', '22.2554760', '113.9081900', 'CmRaAAAAZTQzUZDHw-vD9BDYuTdCVrkfuNxkZGmpLlQPuJamYN-kqQ7dz62SFlVlJDf2b-l-wNcLtTg-y-9ZAQ-J_MN3YVpgjJzL1NpjM0zSnOCHZzPhop6OFalCEOBDAJVPa8yGEhCu3T1UcbcAu-PQnuVQEGzyGhQOjjAnYRWePil03OX_xgQ6sFw07w', '+852 2985 5248', 'Ngong Ping, Hong Kong', NULL, 4.5, 1, 7200),
(19, 'ChIJAwrVqLP9AzQRi13F9cBjl2M', '愉景灣觀光馬車', '22.3075400', '114.0166580', 'CmRaAAAAIcUVODFrND9GKNT9pV26rgb9oTrDnFCj00amQAMoNfMYNvhdnDO6Jqebyq9tMZVR1vym-0KgbcTpGkWKbIWHHXCnUu_gRYAkLry_gx88cAGQkgnZ_Toy6C2X_fOFO5RuEhBBytkEjWmQ2jhlAt-v9nP9GhQCU6t9Q8xQe8MsNN_i6sLcTe7jcA', '', 'Hong Kong, Discovery Bay, Siena Ave, 88號酒店', NULL, 0, 1, 7200),
(21, 'ChIJQ73aHHYABDQR5twO0q4bzM4', 'Victoria Peak Garden', '22.2742870', '114.1440780', 'CmRaAAAAYWxbRl7myqyifi4tWwZwPJ1gRv_05ffUvT9MdL49YS7pYiG1VhYFJVLlFz_N6XNeajNua0YtFpH-9pChlgClqvSAzeTQPZUsPbZdVeGKHRIpw2xnN3LImCBPu5MB_wGdEhCrhhfhJW611kDLcFEFoKwLGhSLEDupnVpWAOpczHlK4gF6y59u7g', '', 'Mount Austin Rd, The Peak, Hong Kong', NULL, 4.4, 1, 7200),
(22, 'ChIJ0XbYFywABDQRAB7DjCemH7A', 'The Hong Kong Golf Club', '22.2463880', '114.1864320', 'CmRaAAAAP6FlzU7Cd2JNcfPy1yFNedb8yCo_kVRjUQuRqPKaj71HWJQW8Hph71ts1d0F3LVG8_i02Qq-HibQTGFDwCtQvPma63bWzh3bAXcNM4mNi3bKnt4u-nM_naEnrZWRSX12EhBU-S3AQsrE2Ca4I8sz9x0vGhSGYujOd7v4osaj-2GLMDrrH1QYtw', '+852 2812 7070', '19 Island Rd, Deep Water Bay, Hong Kong', NULL, 4.2, 1, 7200),
(23, 'ChIJu873FJEABDQRUFCXT1r5Xmo', 'Sky 100 Hong Kong Observation Deck', '22.3033810', '114.1602310', 'CmRaAAAAuvH8BxfPIz7v3q1tc6NahHHAMKnP-zX9AKqZdfvsj2WpZMyIkFO6TeIRZe7dTtSU-1ICbOdd7A5y6O_LYD46QmblUV4O8q6DylXwJcCw4jGnYdzlC6BLIgWY4tOT8YtoEhBZmu1ucCu_EcAI7GjSbbMWGhSTlIZvlA--RO3Mr_l9KZhMvP4s6g', '+852 2613 3888', 'International Commerce Centre (ICC), 1 Austin Rd W, West Kowloon, Hong Kong', NULL, 4.4, 1, 7200),
(25, 'ChIJpeEnUpJWATQROB6LunX-Kc8', 'Hung Shing Temple - Cheung Chau', '22.2058110', '114.0285680', 'CmRaAAAAHJFU58sgqmDwIfSrIVRBHmbeaPJM3JR0MKPz4oFJJr7iz3Z-KXNr1iTYY9u2WorDvTvb9x5_OGfiw2xSln_yjXFwoXjHg0bP2lFjkDDLqU4bUx9QyU1zs6wizHesTizjEhB9K6YrVmIlPYBdp_HHdjRbGhTfleawPwd1u-6lG30NsyF8eJBQ-Q', '+852 2981 0459', 'Cheung Chau, Hong Kong', NULL, 3.8, 1, 7200),
(27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 'InterContinental Grand Stanford Hong Kong', '22.2989930', '114.1793270', 'CmRaAAAAvoYcqab1sUGdcMojEFaQFr2UGFP1pF2XpFzb8mAzZ_guJm4wS3mFl82o0RsmAGg1aKLcutFJd6-b89y1J2dyf37tmBiWbUkkLB5061b5ZTPm6aSSCpEPLV3MCg8D47kpEhD4qRkD4xMYFbC7h_hApjPgGhRaMr6wgsFC4mjQcyorZtInMLI5Jg', '+852 2721 5161', '70號 Mody Rd, Tsim Sha Tsui, Hong Kong', NULL, 4.2, 1, 7200),
(29, 'ChIJ7QNny1gABDQRgc47Ya61z2Q', 'Golden Bauhinia Square', '22.2844250', '114.1739010', 'CmRaAAAAYBg2H0a9u15C2RXj93HuO1n9KJ_Whue5jTYai47I5XXoLi60DUAelMpcpSx8CHtXS_C3TVtOG-C0xlnXL_OEel29UoTifXsE8ZsFAn8q9E_uaL2HKP16RcT1CwzFMLQ9EhB7BB_wTBsRhFYJCN5Htm8BGhTgDZbD0TgEB8ZKudgoyyEAL3QLzw', '', '1 Expo Dr, Wan Chai, Hong Kong', NULL, 3.8, 1, 7200),
(33, 'ChIJdRlVSfIABDQRq5S65hPQo-8', 'The Peninsula Hong Kong', '22.2951020', '114.1718540', 'CmRaAAAA1vDs3q5mA7t7QlFAoqWgFnKmws5z1ckv0MM2lpgnbJriQCzGiJevTQRN7nNeiIRHtXJ22lgi24w4R3NxhN6vf0RuWBIttYYdVKmb2W6ALkWYJ90N95T5KJW12igaRN_SEhA9Qn7n4NddZZz1qpuB5fsvGhRfvScvcrBPwT0sLkYoh7aVtG2guw', '+852 2920 2888', 'Salisbury Rd, Tsim Sha Tsui, Hong Kong', NULL, 4.1, 1, 7200),
(34, 'ChIJEx3Yj34ABDQRdpXvcKoUZKE', 'Sohotel Hong Kong', '22.2864470', '114.1489510', 'CmRaAAAAxJx0dreMW2WZw3DGelhu1yy-JnnAcZ-jleWQS3OjAsV7k7cdGj82H-3itZ1Ufmgr_QsRdBGwW9b6X0yE8qOu5_rlZ0ys7rnvjj6dNxrZChflSOIQWpDmwTn-7wEvV_QqEhBvUVj0Qk52-BXOHgAZ3WMMGhSVkWSWXSQYGGCrEqO1P8fJ5Ib36w', '+852 2851 8818', '139 Bonham Strand, Sheung Wan, Hong Kong', NULL, 4.1, 1, 7200),
(35, 'ChIJUUoEMlwABDQRf9H0ooj1FVY', 'The Harbourview', '22.2801900', '114.1711060', 'CmRaAAAAI7sGarF9S4IR9mwoCHrhAW4VPJa4XA9hFYaV1JqriFA8yHtI9tqs9k-NNKgLHzzARh_nMivaVK4xVO94nSuVBEnz0qhULzc7gaKfUiG8HO-k6HF90hSTsrttFtjrT9CBEhCpe5zjdWI95fa0KGT1OzDBGhR6YfMbE6pgMJkGWlyktcY6hraTSw', '+852 2802 0111', 'The Harbourview, 4 Harbour Rd, Wan Chai, Hong Kong', NULL, 0, 1, 7200),
(36, 'ChIJEXMJ7XwABDQRHkQ2_q-FDnM', 'Jenny Bakery Sheung Wan', '22.2851030', '114.1537280', 'CmRaAAAAXIGQLvOt96CiVBscCM2G9lgxwkEWnkfZW24skGNuCD_3z6UuouqdzyjfibYEdjlk_7PXCnpLZy2FY8irKWkdcPGA7rbQbeK6GQ1T_6FfSZbcZ9CLe-YMppOaE0srKkEuEhDh2tVYD3vzmJmNcleUqrbtGhSVPS4keYapmGUVEluocZ5UhMrWHg', '+852 2524 1988', '號地舖, 15 Wing Wo St, Sheung Wan, Hong Kong', NULL, 3.7, 1, 7200),
(37, 'ChIJySAMrZL4AzQRSeamG7X-iQg', 'Sam Tung Uk Museum', '22.3719660', '114.1203180', 'CmRaAAAAeXbk3_ReFxWwhNO5C0F6510tQwZVe-vLdPpDrpAN3RG41grCihWJ4hPWevrqbfJcrfeB3LTtS4AvvuTQ7eSW1j220uK_2qhpnNc-0Kbz9sqgEenHQVH7rrN7YaSBC9_UEhA1MnqDAjZj2lio78DGlDI6GhR9PNrRB1mJWhQMEy21Y7PozsfWlg', '+852 2411 2001', 'Hong Kong, Tsuen Wan, Kwu Uk Ln, 二號', NULL, 4, 1, 7200),
(38, 'ChIJ-f7e5aMHBDQR1Bz-AYFVvUg', 'Puguangming Temple', '22.3817770', '114.1726960', 'CmRaAAAAtjOm2rjLgypbABHPir1XjwtMJBNgfOhe2WNZPXlf-N-rl8fmT-srRMQ0op1UnFUdG8kpNZ3505XVCf8YDNC0x-zoWOdHqLPi9Z_AEl7Q5CCFpga0Pmr2-iT-GfRjWoaHEhACwt1mg155EXEOZE3aeTA4GhQaztNJTtjfG_DtwNx5kKKlsZVR7Q', '+852 2699 8061', 'Hong Kong, Tai Wai, Mei Tin Rd, 白田村二區96號', NULL, 3.6, 1, 7200),
(39, 'ChIJF-gQmAQBBDQRnY_EwwsKdYQ', 'ibis Hong Kong North Point', '22.2922980', '114.2007420', 'CmRaAAAACa2lxP_5IxeAJ3G5bAwbn-UeTkNX9l51KDbLHWZaBCQQHApG9bqlSNLzTQC2eTqeK-zhr5a2T2YuA-tEtXAPtVVEJpe1HFugudE63ZfAVr4kP_t_-ylH0SXLPr05zF5MEhCOkxAUsBnoqqawADbUBg8mGhTMtFt2E3eLPWHPTSNXBmBFFkEzQQ', '+852 2588 1111', '138 Java Rd, North Point, Hong Kong', NULL, 3.7, 1, 7200),
(40, 'ChIJk_ONblxYATQRI2U-NIiLMbA', 'Ngong Ping Campsite (Lantau)', '22.2549750', '113.9139440', 'CmRaAAAA8985rVtI8wijOV0IGHFkstz_L5v50ngV_6VKb9xM7alDTzePu-8s-EVwlF8W_ssRzL--IFJWGOkO-NwXCg90yrxLoko7EDVoikoRX4Ibs_V89Yfq67LNxix-B3LSMNkZEhAb82Tv1b_y4XdX-fiIdxYfGhRXm_EzL-VjRLYAdHWwL4rzGDZlIw', '', 'Ngong Ping Lantau Island, Hong Kong', NULL, 3.8, 1, 7200),
(41, 'ChIJqzi7WKRZATQR6HZi4tRZ3NA', '鳳凰渡假中心', '22.2221810', '113.9149340', 'CmRaAAAAZH0iRvcYoZ-wnlphAWEgOjgpFCDKsOibaOVqCgSz-gLRmBUNZ-RtbVKk2AMapDQezTa5epZl-Ic90c7KgD6I2oXYhCbpAN5oXyx0HvZZWwUfrtsXAIvQP8KrNcDZA2nREhDadp5EWIFNtnM7Z-RiOEOlGhSFreutvPYHIBNGz_pDhr3KLTsAUQ', '+852 2980 2325', 'Lantau Island, Hong Kong', NULL, 4.7, 1, 7200),
(42, 'ChIJ1YGeAQIBBDQRcs0ePchsIgU', 'Harbour Grand Hong Kong', '22.2890070', '114.1918460', 'CmRaAAAAOnd3H7OY3oUvs-GZKCe_daGY1bPdIU1NcFo47-mXP4lhOmyAIC0v_ZNA0sqNcZpfeVK4tMiMN8O6UVKB9LQebnHy6qGQ1W3fKtcgkdvZKlxo41kTlmDYGErMEveuufFdEhDAX1wtu_Hjmu81P-YA6UHWGhTZFO-fedRc8Tt6JMTTFxirrnSFDg', '+852 2121 2688', '23 Oil St, North Point, Hong Kong', NULL, 4.5, 1, 7200),
(43, 'ChIJAXf8fX4BBDQRxWH9GL2vp3o', 'Hong Kong Museum of Coastal Defence', '22.2818050', '114.2356500', 'CmRaAAAA6vqwQ60V8qSJfhHGECh-Bk9zJzpkyNeW9Z4FgUCavtDkrr5qb1ddrBLO7UuF0zZEJvaXI-5ETUmm1a5ISUA2BTB5ip1bqXRiv8_dE0dMMMB3UQ8AFqSuqV044UonG6lzEhBU3X0TcLsDj-EkydxcE38KGhTw_jbj6zpVBd6H2sibQQLBJRMKdw', '+852 2569 1500', '175 Tung Hei Rd, Shau Kei Wan, Hong Kong', NULL, 4.2, 1, 7200),
(44, 'ChIJsd2-34n_AzQROJPZYjyLMS4', 'The Victoria Peak', '22.2758830', '114.1455320', 'CmRaAAAAQbkDcvu82JmjbUQPBswc7fR_gXSnqWrBcxJOQhB4_a-7IP8YB5Xdj4_RcoJBfTatt6Xuc8PgZAK_uTaWQZALVYhlTHVgeSR1fjMEua-sLEQ0JZV11RKNcw8zBiDr3dH5EhDxIg1D7GESYHmTHS1in-NtGhR7r3Lq0qu0xdKhjf2u8QXz8TuMUw', '', 'Victoria Peak, The Peak, Hong Kong', NULL, 4.5, 1, 7200),
(45, 'ChIJgZy3ZekABDQRD5GGwRqViAo', 'Kowloon Cricket Club', '22.3047960', '114.1738350', 'CmRaAAAASPo-a0ylycr4rBGEAAmk4byYTH51H3St6KNNKxVhqBFBqhGBnGQPkkDnl_NFwToRk9XSYrR5FGlMEB07-4_rYbNDw2A3P4Fk5NE75Ja28UB1R9DEA_ubiZrZqpp46kOUEhCgPYMEbNTjY6I_qXeAbJOCGhSuX43hdl6xE2wLjGiuifzEjIMk_A', '', '10號 Cox\'s Rd, Jordan, Hong Kong', NULL, 4.2, 1, 7200),
(46, 'ChIJR1J4iXMABDQRqBwOAYY2gAo', 'Peak Tower', '22.2712360', '114.1499640', 'CmRaAAAAgpoLS-xoQI--ce6JTSAVUdHOU7u5MtuxqBdoHAqpnoozsOe3l3zPUthgqbm9z2dVfLq4r9_7uiQ8SKgC3lBRAKhZHmYobW5OidHt3cyyWXVLgxqEgagWXlt4v07r9gT9EhCNzvx6Lc_W1tFEOYtqx5GPGhRJCArMqZ08JH_ZZKDS4wOfHbfmvA', '+852 2849 0668', '128 Peak Rd, The Peak, Hong Kong', NULL, 4.3, 1, 7200),
(47, 'ChIJrWScMlwABDQR41dJWC_pVcg', 'Hong Kong Arts Centre', '22.2801700', '114.1708310', 'CmRaAAAA2hz8QMf3w7kre9fQAKwct3lhiPajYVQuvyonVIT-njcuVaw_KecPvsf7j8jGIhiGgtoaTAh08Q_RT8AeF4VJifCXQi0cogjbmfTbmEJYyvvAk7cjKptvgx3AgqTsBYLLEhChx_-1K7yNAhLoKAkgJagNGhSGRj8IbWHfYtbrTlAVG_B9tYuOjQ', '+852 2582 0200', '2 Harbour Rd, Wan Chai, Hong Kong', NULL, 4.1, 1, 7200),
(48, 'ChIJzXjRY6kHBDQRGOILZN_aSWU', 'Hong Kong Heritage Museum', '22.3771220', '114.1853650', 'CmRaAAAA4mSC8v8kegUpB6xiwdsMQf-VJRGgvWCYzjQDlzxVOjnrT6UTxzfx6jr6_clKUEwA3J8Xv1FrI1OUEQVnEGDJ9E7rumY4zxxVGxODuzgIm0Zn_qbPnb8upEM4xCvCBSjFEhCvM7at3fBG6Z9m6TXCVLP6GhThZSm4B1IWoR1kXEt2SJMfu9_miA', '+852 2180 8188', '1 Man Lam Rd, Sha Tin, Hong Kong', NULL, 4.3, 1, 7200),
(49, 'ChIJx_WyiXMABDQRJnFIJdc19Kw', 'The Peak Tram', '22.2776830', '114.1591910', 'CmRaAAAAZR_v4YCMfkxxEzbOdTfkm5GcMEFKLe7q5Fqpf-TjjhC_wpuIjNnlY5QBdalUxCna0E1mFz9XaFkamd-q6CBNwK7IoW2JbuKNMSeQCeqZ2wBMrXYRfkE0f391WYseRKuIEhBDx1PWAfidgAbhfywgA4GhGhSSF8lNwIC0AlnjbZERl5M6k-8AEA', '+852 2522 0922', 'Central, Hong Kong', NULL, 4.2, 1, 7200),
(50, 'ChIJ2SDZLO0ABDQRp9wW56JJj9k', 'Victoria Harbour', '22.2825280', '114.1689870', 'CmRaAAAAiiD6yjy_bFZgdrHYtqWMI0QgcJkRT4U5WwRQDuj-ZaZttp5aWmC7QIN_MmgC6xxL-J9Bhjt4RIVbd7C1s3ivFRatJRJhu1FkQRwEC63hLJqJJz2gdZyAPbIyPQCZyu_WEhA8M9Xqwb5vt7TAAKtgdIwRGhR4LiK8492EdKFkpaXaW_eoPxUPQw', '+852 2508 1234', 'Admiralty, Hong Kong', NULL, 4.5, 1, 7200),
(51, 'ChIJS-suTAIBBDQRLPBdctl0dXo', 'City Garden Hotel Hong Kong', '22.2902930', '114.1941820', 'CmRaAAAA4UasRlaImHiqgUq7SSoIHLzT1-WoL7bqwdRcKFFGnYMQhoSmUccAsdoPBBHdUPoS-KFH_KVHrrwQD63jCzCah8zIf1zXzR5CCmzCzFKnRB_7BT8FUtfrh9zrtWYrykpPEhAldI9nBrrCIhgoug5fKmSdGhTbfj_GZDgt6B-VUlYVTEmDj-4sEg', '+852 2887 2888', '9 City Garden Rd, North Point, Hong Kong', NULL, 4.5, 1, 7200),
(52, 'ChIJc06QK2IABDQRW2LpLccKBW0', 'The Hong Kong Observation Wheel and AIA Vitality Park', '22.2852859', '114.1617221', 'CmRaAAAAqixI4HCs5X0qd3aml0ukAOewceCt-UDjiomwmnssXdTPOLB3xq6qyDj0fxECAyFzfRTvu6hdlox2ZpfxeRn0rzWQ8fSXNfwF43FxUpuidw6H4gyRm8fK11_HoYL6P5jKEhDkCGVKyVhBnwujbgxgTEeRGhSNUKKO7tffJsv5wHp-JksVjMaxNQ', '+852 2339 0777', '33 Man Kwong St, Central, Hong Kong', NULL, 4.2, 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `attraction_comment`
--

CREATE TABLE `attraction_comment` (
  `commentID` int(11) NOT NULL,
  `attractionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` varchar(2048) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `attraction_type`
--

CREATE TABLE `attraction_type` (
  `id` int(11) NOT NULL,
  `type` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `attraction_type`
--

INSERT INTO `attraction_type` (`id`, `type`) VALUES
(8, 'amusement_park'),
(8, 'establishment'),
(8, 'point_of_interest'),
(8, 'tourist_attraction'),
(9, 'establishment'),
(9, 'lodging'),
(9, 'point_of_interest'),
(10, 'establishment'),
(10, 'lodging'),
(10, 'point_of_interest'),
(11, 'bakery'),
(11, 'establishment'),
(11, 'food'),
(11, 'lodging'),
(11, 'point_of_interest'),
(11, 'restaurant'),
(11, 'store'),
(12, 'establishment'),
(12, 'point_of_interest'),
(12, 'shopping_mall'),
(12, 'tourist_attraction'),
(17, 'establishment'),
(17, 'place_of_worship'),
(17, 'point_of_interest'),
(17, 'tourist_attraction'),
(18, 'establishment'),
(18, 'place_of_worship'),
(18, 'point_of_interest'),
(18, 'tourist_attraction'),
(19, 'establishment'),
(19, 'point_of_interest'),
(19, 'tourist_attraction'),
(21, 'establishment'),
(21, 'park'),
(21, 'point_of_interest'),
(21, 'tourist_attraction'),
(22, 'establishment'),
(22, 'point_of_interest'),
(22, 'tourist_attraction'),
(23, 'establishment'),
(23, 'point_of_interest'),
(23, 'tourist_attraction'),
(25, 'establishment'),
(25, 'place_of_worship'),
(25, 'point_of_interest'),
(25, 'tourist_attraction'),
(27, 'establishment'),
(27, 'point_of_interest'),
(27, 'tourist_attraction'),
(29, 'establishment'),
(29, 'point_of_interest'),
(29, 'tourist_attraction'),
(33, 'establishment'),
(33, 'museum'),
(33, 'point_of_interest'),
(33, 'tourist_attraction'),
(34, 'establishment'),
(34, 'lodging'),
(34, 'point_of_interest'),
(35, 'premise'),
(36, 'bakery'),
(36, 'establishment'),
(36, 'food'),
(36, 'point_of_interest'),
(36, 'store'),
(36, 'tourist_attraction'),
(37, 'establishment'),
(37, 'museum'),
(37, 'point_of_interest'),
(37, 'tourist_attraction'),
(38, 'establishment'),
(38, 'place_of_worship'),
(38, 'point_of_interest'),
(38, 'tourist_attraction'),
(39, 'establishment'),
(39, 'lodging'),
(39, 'point_of_interest'),
(40, 'campground'),
(40, 'establishment'),
(40, 'lodging'),
(40, 'park'),
(40, 'point_of_interest'),
(41, 'establishment'),
(41, 'lodging'),
(41, 'point_of_interest'),
(42, 'establishment'),
(42, 'lodging'),
(42, 'point_of_interest'),
(43, 'establishment'),
(43, 'museum'),
(43, 'point_of_interest'),
(43, 'tourist_attraction'),
(44, 'establishment'),
(44, 'natural_feature'),
(45, 'establishment'),
(45, 'point_of_interest'),
(45, 'tourist_attraction'),
(46, 'establishment'),
(46, 'point_of_interest'),
(46, 'tourist_attraction'),
(47, 'establishment'),
(47, 'point_of_interest'),
(47, 'tourist_attraction'),
(48, 'establishment'),
(48, 'museum'),
(48, 'point_of_interest'),
(48, 'tourist_attraction'),
(49, 'establishment'),
(49, 'museum'),
(49, 'point_of_interest'),
(49, 'tourist_attraction'),
(50, 'establishment'),
(50, 'point_of_interest'),
(50, 'tourist_attraction'),
(51, 'establishment'),
(51, 'lodging'),
(51, 'point_of_interest'),
(52, 'establishment'),
(52, 'point_of_interest'),
(52, 'tourist_attraction');

-- --------------------------------------------------------

--
-- 資料表結構 `blog`
--

CREATE TABLE `blog` (
  `blogID` int(11) NOT NULL,
  `planID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: private 1: public 2 removed by admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `blog`
--

INSERT INTO `blog` (`blogID`, `planID`, `userID`, `title`, `content`, `state`) VALUES
(8, 12, 1, 'a', '{\"ops\":[{\"insert\":\"a\"},{\"attributes\":{\"background\":\"#ffebcc\"},\"insert\":\"sd\"},{\"insert\":\"\\n\\n\"},{\"attributes\":{\"background\":\"#ffebcc\",\"size\":\"huge\"},\"insert\":\"aa\"},{\"attributes\":{\"strike\":true,\"size\":\"huge\",\"background\":\"#ffebcc\",\"color\":\"#f06666\",\"bold\":true},\"insert\":\"a\"},{\"insert\":\"\\n\\n\\n\\n\"}]}', 1),
(10, 12, 7, 'test', '{\"ops\":[{\"insert\":\"test\\n\"}]}', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `blog_comment`
--

CREATE TABLE `blog_comment` (
  `commentID` int(11) NOT NULL,
  `blogID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` varchar(2048) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `country`
--

CREATE TABLE `country` (
  `countryID` int(11) NOT NULL,
  `EN` varchar(32) CHARACTER SET utf8 NOT NULL,
  `ZH` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `country`
--

INSERT INTO `country` (`countryID`, `EN`, `ZH`) VALUES
(1, 'Hong Kong', '香港'),
(2, 'Taiwan', '台灣'),
(3, 'Japan', '日本'),
(4, 'United Kingdom', '英國'),
(5, 'Switzerland', '瑞士');

-- --------------------------------------------------------

--
-- 資料表結構 `plan`
--

CREATE TABLE `plan` (
  `planID` int(11) NOT NULL,
  `useTransport` tinyint(1) NOT NULL,
  `noOfParty` int(11) NOT NULL,
  `countryID` int(11) NOT NULL,
  `startTime` date NOT NULL,
  `endTime` date NOT NULL,
  `state` int(11) NOT NULL COMMENT '0:create 1:need to gen 2:complete 3:regen 4:edit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `plan`
--

INSERT INTO `plan` (`planID`, `useTransport`, `noOfParty`, `countryID`, `startTime`, `endTime`, `state`) VALUES
(2, 1, 1, 1, '2020-05-24', '2020-05-26', 2),
(7, 1, 1, 3, '2020-05-28', '2020-05-30', 1),
(8, 1, 1, 3, '2020-05-28', '2020-05-30', 0),
(9, 1, 1, 1, '2020-05-28', '2020-05-30', 2),
(10, 0, 1, 1, '2020-05-28', '2020-05-30', 1),
(11, 0, 1, 1, '2020-05-29', '2020-06-01', 2),
(12, 0, 1, 1, '2020-05-29', '2020-06-01', 2),
(13, 0, 1, 1, '2020-06-24', '2020-06-25', 0),
(14, 0, 1, 3, '2020-05-30', '2020-05-30', 1),
(15, 0, 1, 4, '2020-05-28', '2020-05-28', 0),
(16, 0, 1, 5, '2020-05-29', '2020-05-29', 0),
(17, 0, 1, 1, '2020-05-29', '2020-05-29', 0),
(18, 0, 1, 1, '2020-05-27', '2020-05-27', 0),
(19, 0, 1, 1, '2020-05-27', '2020-05-27', 0),
(20, 0, 1, 1, '2020-05-27', '2020-05-27', 0),
(21, 0, 1, 1, '2020-05-28', '2020-05-31', 1),
(22, 0, 1, 1, '2020-05-28', '2020-05-30', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `plan_content`
--

CREATE TABLE `plan_content` (
  `planID` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `attractionID` int(11) DEFAULT NULL,
  `googleId` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `placeOrder` int(11) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `start_time` char(5) CHARACTER SET utf8 DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '0:start, 1:attraction, 2:hotel, 3:end, 4:transport',
  `add_by` int(11) NOT NULL DEFAULT 0 COMMENT '0: add by user 1:generate 2:remove',
  `route` mediumtext CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `plan_content`
--

INSERT INTO `plan_content` (`planID`, `day`, `attractionID`, `googleId`, `placeOrder`, `duration`, `start_time`, `type`, `add_by`, `route`) VALUES
(12, 1, 12, 'ChIJncZGzPPiAzQRnjaSGIKQ9fk', 1, 7200, '09:00', 0, 1, NULL),
(12, 1, NULL, NULL, 2, 2440, '11:00', 4, 1, 'q{egCazlvTqE`CaCrBWj@cAtAMzAb@hAPDZXRt@Qd@c@Lq@Mi@s@b@qAT{CbAuAVk@`CsBfCyAfBkBbBy@nBg@fBD~@\\|FTTQd@Kn@RXp@~CnAnDfDtDvB`Dd@tIh@jL~AlOzDxF`AxEJxGZfDSpCk@jA@hAXbAt@bCnHp@dAtBdAbBTvB`AbFnCdGbBtAFl@UVqB|DuXIsBTa@f@CNJtCFpBc@zAsBhJyPzDyEdBoBv@w@^k@RLrClBdExCjF~DhBdBr@~@VZf@e@jAeAd@c@p@m@RRx@dAf@pAHl@XrKjA|Mj@dAfFrDzAvAr@VjA?vCsChAo@fBM`EPlAf@pAVvAEhEUtEm@~@W@E@EJCHH|AMzDnA|@KbAq@~DmDzFsGvEmBzEyA`Bq@~ASxBQpCPjD]bC}@xCgCjCmC|Bg@lCLhD_AtAOlANtAt@r@R|AMtAqAvAuB|A_@~Bv@|@Xt@AlAi@hAeCnAkAxBc@bEsBhAwA\\iAt@kA`Aw@bCuAl@aAf@wA~CiCjAgBnAyBxB]rDC|AYv@w@lBaDrB{B`A{CVqCbAgBnBgBZiB\\}L?_CmAwBUeBj@}CbAmE|CyFjBcGM}D?_Cf@sAfB_BBOLETTCLjDrD`A~@dHbCzA|@bBlEdAbDId@]h@yAh@iCn@u@l@DhBx@zDCz@{@t@wB@qBl@wArAa@vBBh@NdBr@fCv@bC?dAg@fDLpBhA|C~CrBfBpDxApDlC~EhBzClBtFbBlGjEzLfBzC~C~Cz@|AVxHn@hGv@bEl@hFpAfCx@hCBlC`@rBlCzCl@dAfBvDrBdCThBu@rCcFdIUjCXzM|@lBpAl@jFdAtDpCrK`Id@`An@nETtAExAc@lBe@dCb@hCxCtFPpCm@fHo@fByBzA{A|@aCxDsChG}B~JuApAcEdA}AjB[zCBjD`A~Cl@zDErAeApCYlC|@|DShDkBnDgDhIkCbMYxC?pBNjAQp@uA|AmBv@cA?aA[c@gAIwAmA}A}BuAaH}A}BZ{Bh@uBWiA_@_Ba@qDQ{CMeB]eCmA{CCqA}A_Ai@}@eA]F}AdBQv@iBx@aAVg@Wm@[gCtBgAxAcAIsDnB_B`@gC}B{BqB_A]sOlAmAn@[h@_@JOM`@oA`A{AzCcAdA{@Fy@e@iA{@aB?y@|@wBLeAe@eB_C_DsA{CkAy@c@{@]s@aASy@?eAs@uAk@sADeARiAWiGoHq@gBeAwBoAkAaAcBI{AJqC@KLOHeCNaB`@}@dBwBAi@iB[Ia@EOqAIE?'),
(12, 1, 17, 'ChIJZ18SMF9YATQR7q9-0iqqAmY', 3, 7200, '11:40', 1, 1, NULL),
(12, 1, NULL, NULL, 4, 78, '13:40', 4, 1, '_xyfCiofvTu@Ee@Q}@a@YCQBGoB@UFKlCa@'),
(12, 1, 18, 'ChIJP9fVNl9YATQRPBvErn2e8zI', 5, 7200, '13:41', 1, 1, NULL),
(12, 1, NULL, NULL, 6, 2375, '15:41', 4, 1, 'uyyfCwvfvTuCl@DdC_@v@WjA?Z[\\[vAEf@ZbAdAfATd@f@x@j@RXDp@?`@Jh@PFEHCPHDTKPa@MMpDJz@\\t@hAhA~@fAp@`BdAbCdGxGjADx@S`BF~AbAr@R|@Al@Tj@nAd@j@bAt@n@xAl@tAdCfDNlA_@pAq@pBHt@`A`BXhAMt@a@`@eBb@_AXa@`@cAdBUp@DHRJdAgAjAc@fKaAtCAhAv@|ChCh@h@XZTMt@O^Gz@m@tB}@p@JJC`ByBjBsAN@d@d@b@HfCu@`@c@R_A`ByAX?d@f@\\`@`@PjAdBj@JvB?p@LlBdAfBXbI^dEpAlBFpC}@zAEjEbAdBf@bCzAf@r@Fb@HvAr@bAz@PnAIx@Uh@g@z@}@Vo@?s@QmAH{A~@aHbA}E|BwGzDaIJgDq@_CKmAJmAxAgEAsAi@iDs@oBSoBDmDf@{Bj@q@hAi@vDaAjAeBXiAvAcHf@yAlC_FzAyB~AaA~A_AZ_@n@eCh@{GIyA[}@cDmGCwBl@cCXoBEaB_@yBm@}Cs@cAaM}IuCgB}Ba@yAWiAy@a@w@QiAS{L^wCl@mA`EeGZaA?{AQaA_@o@mByBuA_DsAcBkAkAa@aASwAIaD]sA{@uAw@mBSsBqAcIa@qEKqGQcAk@eAaB_B}BuC}BwEiCgIkB_H_BqEyGuLqAoDeBoCkBaAk@s@}@yCEyBf@oDOsAaA}Bm@iEDcBb@aArB{Av@UfAEtAEl@}@IuAs@aDGeANa@|As@tDkA\\m@Bs@qC}H[a@qCuAsGiCw@eA}AwAcAk@KKAO?aCKuANwEE{A]gA_AiAm@EiAJiAC{@e@Ic@RqB?kA_@qA?iBIWkAc@kEFOHg@f@kAZ_A[Y_AQcCq@mFRmBWs@yBiA}@kA_@iAHgBz@eALYE_Ae@wAGwE@cA?yAr@Dz@@LClAWrAg@r@{Ax@oCDu@cBiAe@_Au@q@CWDo@d@aBf@y@^M\\?vC`Ad@?z@g@n@i@bBe@j@Op@w@f@wBQsAUuANUdAg@ZUXJ`@h@~AjBZXl@Tz@RBXPVd@G`Ak@B}@WiAk@}A{@{@m@gBIqAkA{AOg@u@uASaBG]]c@y@q@q@gBMo@RiAReAKoAEgBu@qDBkBb@e@x@aB@s@Q_AJcCNkAK}@Ke@]k@[IYUk@uDJo@M{@e@yBc@m@BUvAoCp@e@Jm@[y@Ao@r@eBjAkBbB`A`@JZSxAmBX]?I@{ANEVWBM^[RSb@gB^[hAc@v@AdACJW\\gFHUXA|Av@DF'),
(12, 1, 25, 'ChIJpeEnUpJWATQROB6LunX-Kc8', 7, 7200, '16:21', 1, 1, NULL),
(12, 1, NULL, NULL, 8, 4000, '18:21', 4, 1, 'msufCc_yvT}B_Ao@tGeADuCt@q@pBo@h@s@tCU^uAfB{@RoAq@{@f@a@Xi@lAQ`@Et@^~@y@lAyArC~@tDBrB~@fE|@r@^hC]|CPbC{@dBi@nCt@~FDzCUzBvChFhArDzAfCt@vDtAbCj@|C}@n@}@Gq@m@eDkCm@y@o@IkAr@O|@b@tB[dB_BdBuExBaDq@y@Os@b@cAfEr@p@jClCiB~GyCbAo@B}AE?tBAlDB`Ap@xCaAxACjDtCjChAnAS~A`@fEv@zFt@\\pASzA}@rFTL\\@lBb@jCW`Cp@bA|C@hBv@t@fCCxI\\|BFNQVMCo@PcBpBEt@R|FyAvE{@~CkAtAiBlGk@xFdBdEc@hLKjD}ApBcAdAu@lCc@|CqBxCsDfFyCn@iEBkBdAkAxC{ErE]hA_C`B_ChBsAdD_EjCmCj@{A|@sAxCcDn@oCkAuAHwDnEwCLsDmAgFlA{BG}BL}ChCeGlEcEp@eFEsEl@mL~DoMnM{BrAqEmAiBNADIHKC}Hx@{DT_DYwGq@cBVgB|AoB~AiACyJgHi@gAiA{MYwKsAaDkAVu@r@iC|B_EyE}NiKeIuF{IwHcDsEkAoBeAc@gAHcAQ]u@`@oCgA_HyDwJiOwOeKqPgGyTaHag@sGm_@iQgd@}JwRok@aiAuB_DcIuJ{EsDuTgNoIaM{Ls\\_KuZoByODye@}A}LaGiO_QiS}UwViJsK_F}J}AuEiAuHq@cFsDoKgI{QcEwQ}AcVuCeIkC_FgOyWkIcPcC{HqC_OqDkSiUkqA}C{OGmFrByEvDcC~JaC|LgC`FuCzEeIdEsKrIcPdYod@ba@{o@zo@q_AdZob@vBmFb@qHyA}IeNgVaWoa@iRkYiCiGSsFlEuOxGaNlGaL`JwLxLeLpIyFdQgIvUmHxJqBlMe@jPxA`NtE~NrHjMjLlVfTdf@pc@~ElErBrECdIqBzFcAfBMbDtBlAjBy@LaEWiE^sIMkJvAaJ|AkHpFeX~FqN`HeEbEmDjByCjAkE|BkMzB}HzAOjFjFdHdJv@rDh@zDz@`B~@`Eb@jEtAnF`Cr@~A}DxAaF`@yCrBiAs@uBAwA|@gASv@Or@j@j@dAv@TfA\\DeA{CVcBz@kAQgB|@oAFsElC{B|DcBzAcBlC_AdAc@@qDbAuB`@AhDzMzD`IxClG^zDc@bDLzD|@pAn@FlBnBxAxAbBkB|@Y~CxCf@dCBzCw@|A_A@aAiC_FYsCtDj@hDQfByDtAy@pAoAzAkFo@_C~BgBjEuBv@uCM'),
(12, 1, 46, 'ChIJR1J4iXMABDQRqBwOAYY2gAo', 9, 7200, '19:28', 1, 1, NULL),
(12, 1, NULL, NULL, 10, 1316, '21:28', 4, 1, 'qy|fCoyuwT|ANt@AhAQb@Yf@o@n@kBf@{A^s@VSTIp@Q\\Ax@L~Bd@L@XIPMPc@XeA`@e@l@a@HCZA\\?ZGp@e@Pm@BU?]E]c@{@KUCUD_@Pe@zAqCLGRCfDIXF^NJNHRXxANNRHf@?\\QVi@V_ADa@AYKq@EuAI[S_@oAqAqAmA]GMBOLu@jAYZSLOBUCOIOQq@iBWc@]SUGs@EOGOKQUa@gAI[Ga@@g@Fm@b@{@F_@Bu@UuB?k@Ee@g@{AiAyBg@{@e@aAKa@Km@Wo@iAsAQ[]w@Sw@c@eBQaAe@oCMg@KSOQSGMBUXo@pAAVDZDb@KzAGTILOJS@_@AWD{@\\}@h@MLa@h@[\\[Va@Ni@DeCrAqAnAS\\ALBZP|@Af@EZITUTEF]f@ARFVDPDb@Od@SXu@x@KRANDR\\f@t@jB?PGHGBKECEIq@[m@MQME[K[SIKEYNe@Ta@?QIGG?MJWl@Un@AV@LbAxAHZCJKL[Pg@R_@RQXK\\Id@?d@GfASfAc@h@MPKb@Ed@@`@Qb@O`@Uh@]x@IRMFQCISMc@gAc@UOKIO]a@yBSwAKc@KUm@cAg@eAa@_Ac@gBEq@WcAu@qB]g@cAgA}@qAqAkAkBoBO]C_@Nu@VoAHa@AOCOoAeAeAq@]MUOS[EYD}@DMX]zA_C^k@f@m@La@P{@FgAC{AC_AIy@OiC?Y@_AXsCN{CVcEV{CBeBMcDe@eJ_@kIOkAa@eBq@{Bs@oCi@oAu@q@{@c@y@k@[C]g@i@q@s@oAm@}Bo@gBu@iBkBeBwAo@k@KaAIkADkdA`KiTtBwGl@sAT_APq@Fc@Ba@Em@KaAUaAa@gEyAwEwA_ASY?OHc@NMF]T]ZS\\QRKDK@IAMGOSCO@OJYv@c@f@Sz@Mv@E`A?|ErAX?~@FrBPbEVFA|@AvCLp@D`ABf@Gh@?H@TFLHV^Hh@Cd@GPQPUPKFh@l@|@fAHH'),
(12, 1, 27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 11, 7200, '21:50', 2, 1, NULL),
(12, 2, 27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 1, 7200, '09:00', 2, 1, NULL),
(12, 2, NULL, NULL, 2, 969, '11:00', 4, 1, 'qjbgCes{wTqB_CTQ@KASOOWCW?CAa@BaAL]H_AV_A`@}@Ra@Bs@Aq@OoAg@q@g@iAcAc@Wi@k@oAc@qEqAm@Cc@Pi@V_@XMd@I^A\\DZL\\x@xAXt@Nh@Dt@?j@AZk@tC{@hEuA`Gi@rCo@tCs@tC[z@m@lAmA`Be@b@w@j@w@n@_@h@I`@Ir@F~@N|APfCEjAYvBWpAc@p@y@n@a@Vy@Zq@LkCVgEj@kBR}@J}Hf@gE\\_ALsAPqCTw@Jg@Ng@Ve@^a@b@]h@IPUz@Kr@KtDKpAY`Ae@`Ac@p@SPi@\\SJ_@JiBZaAB}XVUB]L]L[PUT[b@kCtDmLzP_F~GgDjEoJvMwEtG[`@s@r@k@^_@P]Ls@PqBd@u@Zm@\\MLe@v@Ib@Iv@Dr@BXRx@v@lCtAvFBt@G`AEXGZKRg@j@yAbAa@Zo@t@Wd@Ux@Gh@u@xH_A`K]lDqA`L{@bJe@|EY`Be@tAcA`Bk@p@mA`AaG`D{EdCq@b@gAx@aAjAu@fAo@|AwBtIu@fCc@nA]n@S^u@`AsAnAo@d@w@^oCp@qBXgADg@@o@CaAKyAKoDe@sGwAwAS_BQqC?qAJw@Pu@ZmAr@]^qBzBaAjAeBjB}B`CwBdCyAxAmCpCeA`AoAdAyAr@_C`A}CdAuAb@cCbAcAb@cAj@gBzAy@|@u@bAq@fAO`AAP?^FTHN\\RV@^KRWL_@@UCi@[sB_@cAUeAU}@y@yDK_@[k@aAgA{D}Ci@U[Ka@Eg@C}BAc@G_@O_@UyCeByBqA{FeDm@[}@[u@Ma@Ey@CaBF}ANKVARZh@T`@r@bAb@f@VTTLj@ZDRDz@CZIx@IXYh@}B~B_@Zi@Xa@NYeA'),
(12, 2, 37, 'ChIJySAMrZL4AzQRSeamG7X-iQg', 3, 7200, '11:16', 1, 1, NULL),
(12, 2, NULL, NULL, 4, 1111, '13:16', 4, 1, 'qqpgCeapwTXdA`@Oh@Y^[~@_Ar@s@q@k@aA}@kAsAo@u@UM_As@_@S[EKAi@Bg@R[Zi@nA_@pA}@rBUXKDY@QHQTCJGRSZQJSF_@BQ?[G_@Q_@a@Ws@G_@?_@@OLa@VY\\Q`@EP?`@HNFf@K`@]l@{@x@mAf@i@|AmAx@e@`Bs@jAYdAWj@E`AKx@AfA?fAFb@Ft@P`Ab@zA|@pJvFlBlATJj@JtC@r@Fb@N\\Lz@n@|@r@~AhAVX\\b@T@LXJ^j@bCRRDLRVRHZ@b@GZUdBeAt@[zAe@hAUz@QN?j@U|@[rBq@x@W`Bq@r@e@rAmAxA{AxAcBtHcIlAoAfDyDvE_FZUTKb@Qp@MfAIh@A\\D`C`@rCv@~Dx@pAPt@BXEf@@fH^hA?j@Cn@G`@Gz@OZK`@Qj@a@xAsARIfB{Bt@yAj@{A`AaDh@kAbCoDb@c@~AiAdB}@hJqDpBs@bBq@lCwArAy@jBwAfA_AdAgAlAwAf@u@fB{CjBgE`CaIzAoFdDkLrCkKr@_D^wAXu@\\kAdAgEvBwGjDsJbA_C|BoEnCqEjByCl@s@fCeD~@cA~AeBpCqCfEmDVSd@UtEeD|@i@v@e@dAk@bB_AxB_AhFuBfJyCnJsCzBg@hAYrDo@zBS~COpDArDJnCTfFv@xEtAt@TpEhBvBx@`CnAdGhD|AnAtD`DvDxDdIjHfLzJzVdUtFbFrFfFfCpBvAzAhAhBVp@Pv@Lr@D|@Al@UdDGt@Oh@y@nB_@j@i@~@Yf@YdAA^BXHb@`@h@NLXLPDV@b@C^SXOLQNg@D[?e@Cq@Ce@QiAI{@BcATgFHkB@aAEuBA}AGuADwAL_AbAiERq@NKBSRkAHm@V_BhAcGvBaKPaAH[Cg@?cA?qAUcFKoB@iAFiANqB^kBl@{Ap@sAPUpB_DzBcErBkERc@rAiD`@gA`AoDnAqEx@oFb@wHt@eSM][a@e@e@}@o@uAq@K]CUCeBEsBM_D{ABMD'),
(12, 2, 29, 'ChIJ7QNny1gABDQRgc47Ya61z2Q', 5, 7200, '13:34', 1, 1, NULL),
(12, 2, NULL, NULL, 6, 1254, '15:34', 4, 1, 'yk_gCsrzwTUBII?IFGnAEp@BR@dCSfB[tAFtAIdAIrBGAOhBGlAELBDF?TIJUFYDmCLF`BXhJIjAS`D]jAI^AVBZ@vAHHDL?LFdCL\\PTZPp@Lx@P^VNXFVJtANlCD|@Dh@A\\Gd@GZg@zAgCpE]n@GXATDVPVrBnA|@r@~@hAfCfDrBjCb@t@Nd@Fb@BZFnBHn@Jb@Rl@P^~@|AN`@NxABf@Fz@H~@VbB\\nB@ZFTZ`@TLnAh@ZBRAHM`@cAf@uADe@Jc@LQb@i@RgAFgA?e@He@J]PY^Sf@SZQJMBKI[cAyAAM@WTo@Vm@LKF?HF?PU`@Od@DXHJZRZJLDLPZl@Hp@BDJDFCFI?Qu@kB]g@ES@OJSt@y@RYNe@Ec@EQGW@S\\g@DGTUHUD[@g@Q}@C[@MR]pAoAdCsAh@E`@OZWZ]`@i@LM|@i@z@]VE^@RANKHMFUJ{AEc@E[@Wn@qATYLCRFNPJRLf@d@nCP`Ab@dBRv@\\v@PZhArAVn@Jl@J`@d@`Af@z@hAxBf@zADd@?j@TtBCt@G^c@z@Gl@Af@F`@HZ`@fAPTNJNFr@DTF\\RVb@p@hBNPNHTBNCRMX[t@kANMLC\\FpAlAnApAR^HZDtAJp@@XE`@W~@Wh@]Pg@?SIOOYyAISKO_@OYGgDHSBMF{ApCQd@E^BTJTb@z@D\\?\\CTQl@q@d@[F]?[@IBm@`@a@d@YdAQb@QLYHMA_Ce@y@M]@q@PUHWR_@r@g@zAo@jBg@n@c@XiAPu@@eBOKBEF}@~FIf@]`Ag@h@{@k@wAaAg@[kAm@KKUBaB|@k@VM@MBc@Ee@GS@KL?VHf@AJKNQJGJ?P@PEPANDR~@^n@ZLLFHBREVINMRDRNx@BNENIPSNE`@I^e@XGP@LDHId@[h@GTFPNDt@JVL'),
(12, 2, 21, 'ChIJQ73aHHYABDQR5twO0q4bzM4', 7, 7200, '15:55', 1, 1, NULL),
(12, 2, NULL, NULL, 8, 1399, '17:55', 4, 1, 'qn}fCqvtwTWMu@KOEGQFURYFOHe@EIAMFQd@YH_@Da@ROHQDOCOOy@ESLSHODOC[UWo@[_A_@ES@ODQAc@NQHEJO@KEOCW?WJMRAhALZEnBcA\\QTCJJjAl@dAp@tBvAf@i@\\aA^eCl@iDJCdBNt@AHA~@OTKb@e@PWHUlAqD^s@VSTIp@Q\\Ax@L~Bd@L@XIPMPc@Ns@Ra@j@e@b@Ux@AZG^SPQFQLq@?]E]c@{@KUCUD_@Pe@zAqCLGRCjBEz@CXF^NJNHRXxANNRHf@?\\QVi@V_ADa@AYKq@Co@Ae@I[S_@UUsBsBWUMEOAMBOLU^_@j@YZSLOBUCOIOQq@iBWc@]SUGUA]COGOKQUa@gAI[Ga@@g@Fm@NURe@F_@Bu@K}@Iw@?k@Ee@Me@Yu@iAyBaAiBWu@Q_AQ]iAsAQ[]w@w@}Cw@qEMg@KSOQIEQ?E@k@kAM_@A_AAKc@}AQe@GGMEUAy@Ac@EiAQq@a@MQMc@UgAAQBQNk@d@eAFMJQjAc@|Aw@PEt@CLG~@u@TKTIr@Gp@Un@QNATBhAd@R?FCHKBI?I?Gc@oAe@uDGu@?_@FeAGyCIi@e@m@o@o@[OOAM?k@Lo@TK@MEKIQq@a@gAAOT}@@KAWGOk@cASk@Ka@F_@NUHEx@WV?x@PHC`@Kh@]TQNW^mARi@h@o@tAcBb@m@JMLGVCxAANEVOX_@r@oAR_@Rg@D_@AkAG[KYe@{@Om@?SF_@PgCFa@HYVa@Nq@RsALyAE}@?_AF]PYVSj@QZ_@\\YPEv@Ax@AZEj@Un@m@E?CAGI?KBE@ANEFDBB@D?B\\YZ[R_@V{@Pu@Da@?k@BU^w@|@}A`@s@?YEu@MaB?m@BOFIb@_@f@_@xAeDl@mA^s@b@m@^i@lByBzAiAfG_DbAa@hA_@p@Q`BUv@KRFRPNz@?n@GVKL_@P}@`@M\\AR@TP\\RXBLEZWn@G^@`@HjA?RENMRERAXDXvAjCXT|@`@vCjA^Hz@@fBB`@NNRFPHh@hAjDNT|@jBF?FDBD@F?BHTJ`AJn@HTPXHDt@Xl@Lb@?rFu@VBPJJJL\\Pr@Jf@ZT\\Dh@MZIh@GLCj@A^?\\BHFDHF|@@b@JPZB`BGFBNMP[PIPCTFPLH@HC^Kd@G^IPKPMPIN?XDHAJKH[AMEIOG[Ai@V[Js@HGAIMA[d@wAZ{ADe@DUb@[DG@OGSy@k@IIGS?MFOHCPLPZ\\X`@b@HPBVFTj@`@l@Vd@NAG@a@HeA@GSIUIS_@?A'),
(12, 2, 22, 'ChIJ0XbYFywABDQRAB7DjCemH7A', 9, 7200, '18:18', 1, 1, NULL),
(12, 2, NULL, NULL, 10, 877, '20:18', 4, 1, 'g~wfCw`}wTLZLH`@NGf@G~@BNxB~CJRHZDV?VG^Sd@c@t@SrAEd@Kh@Af@@PHPJNx@x@HPDXB~ACv@Gp@B^Fh@@d@Al@Hx@LjA@VCV]f@s@Zc@j@QdAW~@[h@_@b@mBvASTmAr@u@Vs@Tu@hA[n@gA`C[`@[V]J[Dk@@g@MSIWQa@a@Oc@Ms@QaCGi@Om@[o@AU_@c@_@YkEiCwDuBqCqAgCeAg@O_AO}ASm@CoCGsDIsMQcIKyFK{ACaGEuBEiHM}GKeCG_HImD?{@H{ARkAPuA^qHnBsAJyAIa@KUGo@[_CyBsBiBm@YUGc@Ia@Gs@CyJUa@@o@H_@JaAZwBr@k@T[P]f@[^MJa@JU?YGQMQ[I[AUDa@Hk@C]Og@KOOKsAq@USq@w@GAGBYq@kBeBwAo@k@KaAIkADkdA`KiTtBwGl@sAT_APq@Fc@Ba@Em@KaAUaAa@gEyAwEwA_ASY?OHc@NMF]T]ZS\\QRKDK@IAMGOSCO@OJYv@c@f@Sz@Mv@E`A?|ErAX?~@FrBPbEVFA|@AvCLp@D`ABf@Gh@?H@TFLHV^Hh@Cd@GPQPUPKFh@l@|@fAHH'),
(12, 2, 27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 11, 7200, '20:33', 2, 1, NULL),
(12, 3, 27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 1, 7200, '09:00', 2, 1, NULL),
(12, 3, NULL, NULL, 2, 1071, '11:00', 4, 1, 'qjbgCes{wTqB_CTQ@KASOOWCW?CAa@BaAL]H_AV_A`@}@Ra@Bs@Aq@OoAg@q@g@iAcAc@Wi@k@oAc@qEqAm@Cc@Ba@Hc@RcA|@y@bAGVU`@i@|@W^w@x@c@`@oAd@mA\\eC|@qFvCqBbAmA`A}@~@[Tk@Vs@L{AA}BQo@EkIgAw@[k@a@sBsBQKYKgC_@gAYs@_@sCsAyAU[Cy@@eAPq@PqAj@_C|Aq@f@WR{@R]@s@KiAa@i@Mw@CyADyCM_FIcBByCEg@EwAKiEIoCGmDMqN_@{Te@eBCkDOmHOeIQoBJ{AVgCl@aAXeATO@e@Ca@KWUQUO_@Gq@Fo@Rk@v@cBLq@Bc@Gy@Qg@k@s@e@Y]Kk@GqAFmGp@QDOHkCnBaHfFyItGmWnRqCpBiCjBoCzB}AbA}@j@a@Pu@Pm@?c@Ac@GgAa@YSUYu@mAwBmF{AcD_@k@aCeCoEqEwBqC}BaEi@q@sBiBOGSOW[i@w@w@gA[Ua@Ks@?}@Jc@H[LeAR[BgAEyAMqAIg@AmBFqBR}@RwA^{Ap@w@`@u@l@kCzBQTWl@?JAJQZWLO?QCa@FI@mAx@{B`BaEzCiAdAQ@gAn@cBv@qAt@UH[LwBhAmGnDc@RMAaAd@cA^]Hc@@m@H_@Bu@BAVIp@}@p@Yf@BNAFEJIFM?C?i@l@GFQ@MCeA]g@@_@CQ?CC'),
(12, 3, 38, 'ChIJ-f7e5aMHBDQR1Bz-AYFVvUg', 3, 7200, '11:17', 1, 1, NULL),
(12, 3, NULL, NULL, 4, 979, '13:17', 4, 1, 'ckrgCyizwTBBP?^Bf@AdA\\LBPAFGh@m@EIAE?CHWBAXe@DAR@|@q@Hq@@Wt@ClAMb@A\\IbA_@`Ae@f@g@hEcCjDiB`FgChB_Aj@bAFF\\v@^j@Z\\d@b@^T^LRNvDlA`Ct@jBn@fBz@fAt@rCtBlCpBn@b@~@z@r@l@jAxAjAbB^t@Th@`AhCxBbI`@fB|@dCbAhB~@|AlBzBl@h@~B|AhB`AdBn@zA^r@Jb@FlFj@pDn@bCp@lBj@xCvAdFtBfH`DhDfBxA|@`BjArAhA~B~BzChD~BdD|B~D`AlBlCxHh@jB~@~Dr@vE^jC\\jCPz@^`Br@`C^z@|AdCbDnEr@x@z@bAPZjA`BlAxAhAjAdA~@l@\\p@\\d@Pv@T~@TdBN~AC^EtASb@Kb@MpAg@l@WlAi@vB{@l@OdAOr@In@CfCD|CPb@@f@Kf@GhBInCItHKnC@`AMb@Sd@i@\\}@z@}BN_@`AiDtByGf@qAj@{A\\u@d@iAnCmFxAeC`AuAlCwDdCaDzBiCrA}AbB}At@m@bCwBVQlDsCpCsB`EmCvAcAzA_AdDaBjCcA~CaAdBo@rGiBvBm@bEc@h@@|COjAGh@?tCE~@KpBU@AhBWr@K^ChCHND\\HtBhARL\\RrAr@TH|@b@^FV?b@DfBn@zBt@bAVF@x@Db@LzCbATFh@}BjAaF@WAKEG]I?r@GZc@xACZDRb@Nr@ZfA~@D^CJUZ'),
(12, 3, 23, 'ChIJu873FJEABDQRUFCXT1r5Xmo', 5, 7200, '13:34', 1, 1, NULL),
(12, 3, NULL, NULL, 6, 822, '15:34', 4, 1, 'qacgC}zwwTT[BKE_@gA_As@[c@OESB[b@yAF[?s@\\HDF@JAVkA`Fi@|BCHUGsAa@mBc@aDk@}DsAmAe@WMYKDMVgAZsApAqF^gBuAJi@Ms@Gq@@qCJ}@TQLQDON_@TQPS\\Ql@Cr@Hx@L^NTd@`@x@j@DF@DdBp@nAXPPLLfCv@t@TpEhBvBx@`CnAdGhD|AnAtD`DvDxDdIjHfLzJzVdUtFbFrFfFfCpBvAzAhAhBVp@Pv@Lr@D|@Al@UdDGt@Oh@y@nB_@j@i@~@Yf@YdAA^BXHb@`@h@NLXLPDV@b@C^SXOLQNg@D[?e@Cq@Ce@QiAI{@BcATgFHkB@aAEuBA}AGuADwAL_AbAiERq@NKBSRkAHm@V_BhAcGhAmF|AsHj@}AnAgC\\}@`AwCVe@JOr@e@d@OTIf@UhCoBPM?AJUfAeAdAeAt@}@TKJ?JDDH@HC\\y@t@i@^u@t@{@n@_@PaBlA@VFNdA|A`BhCXd@_@`@{BxD]f@yAxA'),
(12, 3, 36, 'ChIJEXMJ7XwABDQRHkQ2_q-FDnM', 7, 7200, '15:47', 1, 1, NULL),
(12, 3, NULL, NULL, 8, 749, '17:47', 4, 1, 'qo_gCuqvwT_@d@a@|@GTe@`A_ArBeEs@gBYQKGGBGRw@Rw@Pw@RmAAICUCKQm@I_A?a@MsAMs@E[EcA?]JeBNwATsATaA^gAn@yAr@oAp@cAbA_B`@u@`DeG`CyFr@oBnAsE`AmDRqAd@}CPqCPeDt@eSA{C?aECeDQuHCiBi@kKWgFQ{C]iHcAaIi@{Ea@wBi@sBo@qBaA{Bk@_Am@}@qFiGkNmM_KiJgBaBuAaBoAiAq@gAe@aAi@iAw@uCUwAOaBWeC]gC[sCCcB?eBEw@Ce@Gc@i@{DaAaIOoD?aCHoCHoCFk@PuAh@wBvAwEv@eD\\kA^y@tAaCvBeDdBuCrBcEx@mBNi@fA{Ez@mFxAoIPo@d@iD`@aBRwAPmCNoA^kAz@}An@e@h@[j@Uh@Kr@Ip@ChEH^BrA@`@E~AWpAk@fFwDtDmCf@i@j@{@Vg@\\aAl@eBTq@Ps@hAaBpBwBnA_BP]R}@HqAAYK_AOu@_@s@Q_@g@g@g@]m@UiAUgBQy@SkA[k@]u@w@c@k@[k@_@{@Kk@QgAGsA@_ABq@No@XmADO'),
(12, 3, 43, 'ChIJAXf8fX4BBDQRxWH9GL2vp3o', 9, 7200, '18:00', 1, 1, NULL),
(12, 3, NULL, NULL, 10, 1491, '20:00', 4, 1, '{a_gC{gfxTd@eAXe@t@y@TWx@i@lBeAp@SvFsDx@e@zAg@zAW|@MbBYb@Mx@a@`Ae@~D{ClDsC|@g@zAm@~A[jAEnADtBV~ATbDj@|Cl@hA`@dBz@b@TnC~@v@PrAP|BDtAKdBOdBKl@Db@FhBb@jAHz@Il@Oj@WPCFGTGZ@^FP^JZDd@CNQTKHG@Y?OCUMWa@q@Qc@CiADk@Cq@KwBc@iAA}CPe@BgADoA?g@A}ASqBg@gBq@kA]oDm@{@SUM}Bs@kD{@cAOcAGuA?eAPe@HaBl@cAf@cBxAcD~BwAjAkAp@uAl@e@JwBXiAPaAVy@`@aCtAyDfC[NuAbAsAhAs@t@q@fA]x@Uv@E`@OjB@pAJv@V|@Vr@P\\d@r@n@l@BD|Av@|A\\bCVXDv@`@v@j@h@j@FJZ`AZjB@fBEj@Ih@Sp@g@~@{CtCQP_AxAc@|@iBzE_@v@u@~@MN_@b@yB`BWR{DrC{AjAe@RcAXu@HkAHy@AkFEmAJWH{@^i@^q@fAa@v@Qh@Q~@I`BkAdK]vD_@nC]`C[rAi@jBi@dBm@bBaBbDsBfE_A`BsBxCq@dAg@~@]|@_@bAQv@gA|FkBvJe@|BQfBIjC@n@^tE~AvLFz@FhEJbBhApJf@`Db@dB\\|@l@jAt@|@r@|@~AbBxD|DbBhB\\\\n@d@rCfCzAxAXRfAn@`@VjAl@|@H`DNL@pAPhAVz@f@b@j@\\j@f@`AVv@d@rBf@lDRlA^n@rAbBn@v@jAnB^v@r@xBn@|BrB|HLJFPlAlDt@lCBVAVIXU\\YLWBUCYMgAcBqBuC_@u@i@qBo@kB_@_AYq@aB_Bc@UsAg@cAKmA@aNpAg_AdJqQbBiAJcAP{AXcAFm@GcAS_A[aBo@iBm@eFaB{@Sm@Cy@\\s@d@m@x@YNUCSSEM?ODSDM^WXMPGl@M|@Mv@Cd@@|ErAr@@pAJxGf@vGXz@BtAIl@APBh@Pf@V~@z@`AhAbE~EJVDd@`E`GZJjA|A|ApBn@xAf@pA`@bAHb@^~BRvB@lB@tAB~@@h@?vBRhB?d@L|BDh@Nd@FPHLVNd@JPFHHDLCLIFQASOy@s@IIMYOu@K{@Q}BM_DCuAMAOBED@J'),
(12, 3, 33, 'ChIJdRlVSfIABDQRq5S65hPQo-8', 11, 7200, '20:25', 2, 1, NULL),
(12, 4, 33, 'ChIJdRlVSfIABDQRq5S65hPQo-8', 1, 7200, '09:00', 2, 1, NULL),
(12, 4, NULL, NULL, 2, 1701, '11:00', 4, 1, 'inagCgezwTBHNBN?Aa@Eu@Ae@QwFOiBIo@]wAUk@g@qAw@cBc@s@iB_Cc@g@cFiGs@cAC?C?KIYW[YgAyA_AmAk@g@i@U_@Ey@Cw@HsBX{@TeA`@]Le@Jw@Bq@G]IsAg@{BkBy@k@SW]MyC_A}@W_ASY?OHc@NMF]T]ZS\\QRKDK@IAMGOSCO@OJYv@c@f@Sz@Mv@E`A?|ErAlAb@tBt@f@JfCTpCLn@@v@AnEa@~Hu@bJ{@ze@uE|\\cDbE]n@Cd@B`@Fr@RfAl@|@p@j@v@zBdC\\Rh@N`Ad@p@r@HPf@tAl@xBDRZbAz@zALb@Z\\r@rCp@lDXlC\\`HBt@j@lLFzAKfDQrDKrCIpAe@lCDhBLv@LhBNhBB`BOpA]fA_AbBq@vAo@nAEb@?PL^\\d@rAjAn@n@lBfCdDfEh@p@Zh@Nd@BLFl@?f@PzBd@`Bl@~@b@z@V~A@TFn@FhAT`B^|BFp@Th@VTTJ|@^RFX?HADGLYr@iBLo@BQJc@V[RUNi@LoA@cALm@Pg@ZUhAg@LKHM@KKU]g@U]Q_@?MDWTg@Xq@JCJBBFAP_@n@E`@JP^Xh@PZd@Rn@B^FFJ?LQI_@m@yASYMWAQDO`@i@Z[T[HSBOASESI[CSHSX_@X[La@Bi@Ca@Ok@CSBQHSb@e@|@y@j@[zAu@n@Gb@Uf@m@n@u@~@k@b@S`@KXCb@@HEPON_A@iAG_@AWFUt@yAJINAXPTb@x@tEz@lD`@dAfAvAZb@LVD\\Lj@N`@|@`Bt@tAh@pANd@Jd@BrAN`A@x@En@ITUb@Mb@Ch@Ft@Vv@Rj@PTVNTDn@DZL\\\\~@dCRNPDPAPGPOf@o@h@y@JEP?L@NJ|A|AdAhAL^BX@p@Hl@Fb@A`@Kf@[|@[^]Fa@EQMGGS}@Ke@GOWS[IYCqCFSBOBMNaB|CI`@@b@d@`AL`@@\\Eh@M^ILSNULQDW@a@?YHu@h@Y`@a@zAMNYJO@oAWuAYo@CUDs@TULQTc@dAq@pBM`@Yh@YZ]TYFkANwBSO@KHi@`DYrBUz@]j@WV]U{@k@wA_A_@W{@c@EEM?MFwBhAc@JY?k@KUAOHER@XDP@NEJKJGBKHCJBTGh@DRb@Nt@\\`@XDDDN@LAHMVMTNv@Hd@IXQLGHCNE`@ENQLWPAXDHE\\CHS\\O\\@JPL`@Dd@LPVL\\DPAHKNQDc@@}A]IGQ_@m@qB]}AGWMQSC_AFGAIKGQA_@Bm@DS'),
(12, 4, 44, 'ChIJsd2-34n_AzQROJPZYjyLMS4', 3, 7200, '11:28', 1, 1, NULL),
(12, 4, NULL, NULL, 4, 1698, '13:28', 4, 1, '{y}fCkauwTIf@?h@FZBHHHL@^Ed@ANLFNLp@XhAr@zBHHVHpAVb@ANIHQ?GQi@ISWMu@KOEGQFUZi@He@EIAMFQd@YH_@Da@ROHQDOCOOy@ESLSHODWCSGIMMo@[_A_@ES@ODQAQ?QFKPKJO@KIg@?WJMRAd@Fb@DLCLAj@W`B}@TCJJjAl@f@ZvA`Az@j@f@i@\\aAHg@|@_GDGJCdBNt@AhAQb@Yf@o@n@kBf@{A^s@VSTIp@Q\\Ax@L~Bd@L@XIPMPc@XeA`@e@l@a@HCZA\\?ZGp@e@Pm@BU?]E]c@{@KUCUD_@Pe@zAqCLGRCfDIXF^NJNHRXxANNRHf@?\\QVi@V_ADa@AYKq@EuAI[S_@oAqAqAmA]GMBOLu@jAYZSLOBUCOIOQq@iBWc@]SUGs@EOGOKQUa@gAI[Ga@@g@Fm@b@{@F_@Bu@UuB?k@Ee@g@{AiAyBg@{@e@aAKa@Km@Wo@iAsAQ[]w@Sw@c@eBQaAe@oCMg@KSOQSGMBUXo@pAAVDZDb@KzAGTILOJS@_@AWD{@\\}@h@MLa@h@[\\[Va@Ni@DeCrAqAnAS\\ALBZP|@Af@EZITUTEF]f@ARFVDPDb@Od@SXu@x@KRANDR\\f@t@jB?PGHGBKECEIq@[m@MQME[K[SIKEYNe@Ta@?QIGG?MJWl@Un@AV@LbAxAHZCJKL[Pg@R_@RQXK\\Id@?d@GfASfAc@h@MPKb@Ed@@`@Qb@O`@Uh@]x@IRMFQCISMc@gAc@UOKIO]a@yBSwAKc@KUm@cAg@eAa@_Ac@gBEq@WcAu@qB]g@cAgA}@qAqAkAkBoBO]C_@Nu@VoAHa@AOCOoAeAeAq@]MUOS[EYD}@DMX]zA_C^k@f@m@La@P{@FgAC{AC_AIy@OiC?Y@_AXsCN{CVcEV{CBeBMcDe@eJ_@kIOkAa@eBq@{Bs@oCi@oAu@q@{@c@y@k@[C]g@i@q@s@oAm@}Bo@gBu@iBkBeBwAo@k@KaAIkADkdA`KiTtBwGl@sAT_APq@Fc@Ba@Em@KaAUaAa@gEyAwEwA_ASY?OHc@NMF]TMJGVK\\E^@ZJ^l@jA`@t@XbADt@A\\@ZC\\Qz@sAjGIt@iAvEI|@YnAKp@JfANlAVx@^r@bArA`DeAXInAG'),
(12, 4, 45, 'ChIJgZy3ZekABDQRD5GGwRqViAo', 5, 7200, '13:56', 1, 1, NULL),
(12, 4, NULL, NULL, 6, 613, '15:56', 4, 1, 'wkcgCcozwToAFYHaDdAOHcAwAk@iAQe@a@]i@a@Hc@Re@H_@nAkGNUl@yCJ_@~@wEL}@Bk@Cg@Gs@]}@Sm@Ya@}@iAw@u@cA[a@Gu@GWFQNIV@^HPRJZF`@G^Sb@c@\\Ub@c@lAqA`@[RO`@Iv@E`A?|ErAlAb@tBt@f@JfCTpCLn@@v@AnEa@~Hu@bJ{@ze@uE|\\cDbE]n@Cd@B`@Fr@RfAl@|@p@j@v@zBdC\\Rh@N`Ad@p@r@HPf@tAl@xBDRZbAz@zALb@l@fDB`@ATEXINc@XsA\\GDAP?fAHnCTbHBz@`@jMIjAMzB'),
(12, 4, 47, 'ChIJrWScMlwABDQR41dJWC_pVcg', 7, 7200, '16:06', 1, 1, NULL),
(12, 4, NULL, NULL, 8, 218, '18:06', 4, 1, 'or~fCe}ywTYCSL_@Z]t@EJER@vAHHDL?LFdCL\\PTZPp@Lx@P^VNXFVJtANlCD|@Dh@A\\Gd@GZg@zA{@~AiB`DGXATDVPVrBnA|@r@~@hAfCfDrBjCb@t@Nd@Fb@BZFnBHn@Jb@CZKPQ?SK[u@Y{@PSHENBHDJLDN@D'),
(12, 4, 49, 'ChIJx_WyiXMABDQRJnFIJdc19Kw', 9, 7200, '18:10', 1, 1, NULL),
(12, 4, NULL, NULL, 10, 682, '20:10', 4, 1, 'mb~fCewwwTGUSQMEKBCBOPGM}@aAaAoAWa@QKsBuB}@aAK_@?_@XqAR_A@OAMAGSUg@e@u@g@e@YOEQIWSO]Ac@Bk@DMbAwA`AyANWf@m@Ro@NeABuAGuBWyCAeBJ_BTiBHcCV_ER{BF}ACyAMkCEaAaA_SKm@_@}Ai@_BGa@s@iCa@_AGO_@[UU]Ow@e@_@Y[AIM_@g@q@_A_@u@i@qBo@kB_@_AYq@aB_Bc@UsAg@u@Km@AuAHwVbCkz@hIyNrAkB\\s@LcAFm@GcAS_A[aBo@yDqAqEqAm@Cc@Pi@V_@X[^QXOJSBYOKU?ODSDM^WXMPGl@M|@Mv@Cd@@|ErAr@@|In@NCrA@tCNvADlAIRDTHXVLb@Bf@IZKRULUPxAbBVZ'),
(12, 4, 27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 11, 7200, '20:21', 3, 1, NULL),
(11, 1, 12, 'ChIJncZGzPPiAzQRnjaSGIKQ9fk', 1, 7200, '09:00', 0, 1, NULL),
(11, 1, NULL, NULL, 2, 2440, '11:00', 4, 1, 'q{egCazlvTqE`CaCrBWj@cAtAMzAb@hAPDZXRt@Qd@c@Lq@Mi@s@b@qAT{CbAuAVk@`CsBfCyAfBkBbBy@nBg@fBD~@\\|FTTQd@Kn@RXp@~CnAnDfDtDvB`Dd@tIh@jL~AlOzDxF`AxEJxGZfDSpCk@jA@hAXbAt@bCnHp@dAtBdAbBTvB`AbFnCdGbBtAFl@UVqB|DuXIsBTa@f@CNJtCFpBc@zAsBhJyPzDyEdBoBv@w@^k@RLrClBdExCjF~DhBdBr@~@VZf@e@jAeAd@c@p@m@RRx@dAf@pAHl@XrKjA|Mj@dAfFrDzAvAr@VjA?vCsChAo@fBM`EPlAf@pAVvAEhEUtEm@~@W@E@EJCHH|AMzDnA|@KbAq@~DmDzFsGvEmBzEyA`Bq@~ASxBQpCPjD]bC}@xCgCjCmC|Bg@lCLhD_AtAOlANtAt@r@R|AMtAqAvAuB|A_@~Bv@|@Xt@AlAi@hAeCnAkAxBc@bEsBhAwA\\iAt@kA`Aw@bCuAl@aAf@wA~CiCjAgBnAyBxB]rDC|AYv@w@lBaDrB{B`A{CVqCbAgBnBgBZiB\\}L?_CmAwBUeBj@}CbAmE|CyFjBcGM}D?_Cf@sAfB_BBOLETTCLjDrD`A~@dHbCzA|@bBlEdAbDId@]h@yAh@iCn@u@l@DhBx@zDCz@{@t@wB@qBl@wArAa@vBBh@NdBr@fCv@bC?dAg@fDLpBhA|C~CrBfBpDxApDlC~EhBzClBtFbBlGjEzLfBzC~C~Cz@|AVxHn@hGv@bEl@hFpAfCx@hCBlC`@rBlCzCl@dAfBvDrBdCThBu@rCcFdIUjCXzM|@lBpAl@jFdAtDpCrK`Id@`An@nETtAExAc@lBe@dCb@hCxCtFPpCm@fHo@fByBzA{A|@aCxDsChG}B~JuApAcEdA}AjB[zCBjD`A~Cl@zDErAeApCYlC|@|DShDkBnDgDhIkCbMYxC?pBNjAQp@uA|AmBv@cA?aA[c@gAIwAmA}A}BuAaH}A}BZ{Bh@uBWiA_@_Ba@qDQ{CMeB]eCmA{CCqA}A_Ai@}@eA]F}AdBQv@iBx@aAVg@Wm@[gCtBgAxAcAIsDnB_B`@gC}B{BqB_A]sOlAmAn@[h@_@JOM`@oA`A{AzCcAdA{@Fy@e@iA{@aB?y@|@wBLeAe@eB_C_DsA{CkAy@c@{@]s@aASy@?eAs@uAk@sADeARiAWiGoHq@gBeAwBoAkAaAcBI{AJqC@KLOHeCNaB`@}@dBwBAi@iB[Ia@EOqAIE?'),
(11, 1, 17, 'ChIJZ18SMF9YATQR7q9-0iqqAmY', 3, 7200, '11:40', 1, 1, NULL),
(11, 1, NULL, NULL, 4, 78, '13:40', 4, 1, '_xyfCiofvTu@Ee@Q}@a@YCQBGoB@UFKlCa@'),
(11, 1, 18, 'ChIJP9fVNl9YATQRPBvErn2e8zI', 5, 7200, '13:41', 1, 1, NULL),
(11, 1, NULL, NULL, 6, 2375, '15:41', 4, 1, 'uyyfCwvfvTuCl@DdC_@v@WjA?Z[\\[vAEf@ZbAdAfATd@f@x@j@RXDp@?`@Jh@PFEHCPHDTKPa@MMpDJz@\\t@hAhA~@fAp@`BdAbCdGxGjADx@S`BF~AbAr@R|@Al@Tj@nAd@j@bAt@n@xAl@tAdCfDNlA_@pAq@pBHt@`A`BXhAMt@a@`@eBb@_AXa@`@cAdBUp@DHRJdAgAjAc@fKaAtCAhAv@|ChCh@h@XZTMt@O^Gz@m@tB}@p@JJC`ByBjBsAN@d@d@b@HfCu@`@c@R_A`ByAX?d@f@\\`@`@PjAdBj@JvB?p@LlBdAfBXbI^dEpAlBFpC}@zAEjEbAdBf@bCzAf@r@Fb@HvAr@bAz@PnAIx@Uh@g@z@}@Vo@?s@QmAH{A~@aHbA}E|BwGzDaIJgDq@_CKmAJmAxAgEAsAi@iDs@oBSoBDmDf@{Bj@q@hAi@vDaAjAeBXiAvAcHf@yAlC_FzAyB~AaA~A_AZ_@n@eCh@{GIyA[}@cDmGCwBl@cCXoBEaB_@yBm@}Cs@cAaM}IuCgB}Ba@yAWiAy@a@w@QiAS{L^wCl@mA`EeGZaA?{AQaA_@o@mByBuA_DsAcBkAkAa@aASwAIaD]sA{@uAw@mBSsBqAcIa@qEKqGQcAk@eAaB_B}BuC}BwEiCgIkB_H_BqEyGuLqAoDeBoCkBaAk@s@}@yCEyBf@oDOsAaA}Bm@iEDcBb@aArB{Av@UfAEtAEl@}@IuAs@aDGeANa@|As@tDkA\\m@Bs@qC}H[a@qCuAsGiCw@eA}AwAcAk@KKAO?aCKuANwEE{A]gA_AiAm@EiAJiAC{@e@Ic@RqB?kA_@qA?iBIWkAc@kEFOHg@f@kAZ_A[Y_AQcCq@mFRmBWs@yBiA}@kA_@iAHgBz@eALYE_Ae@wAGwE@cA?yAr@Dz@@LClAWrAg@r@{Ax@oCDu@cBiAe@_Au@q@CWDo@d@aBf@y@^M\\?vC`Ad@?z@g@n@i@bBe@j@Op@w@f@wBQsAUuANUdAg@ZUXJ`@h@~AjBZXl@Tz@RBXPVd@G`Ak@B}@WiAk@}A{@{@m@gBIqAkA{AOg@u@uASaBG]]c@y@q@q@gBMo@RiAReAKoAEgBu@qDBkBb@e@x@aB@s@Q_AJcCNkAK}@Ke@]k@[IYUk@uDJo@M{@e@yBc@m@BUvAoCp@e@Jm@[y@Ao@r@eBjAkBbB`A`@JZSxAmBX]?I@{ANEVWBM^[RSb@gB^[hAc@v@AdACJW\\gFHUXA|Av@DF'),
(11, 1, 25, 'ChIJpeEnUpJWATQROB6LunX-Kc8', 7, 7200, '16:21', 1, 1, NULL),
(11, 1, NULL, NULL, 8, 4000, '18:21', 4, 1, 'msufCc_yvT}B_Ao@tGeADuCt@q@pBo@h@s@tCU^uAfB{@RoAq@{@f@a@Xi@lAQ`@Et@^~@y@lAyArC~@tDBrB~@fE|@r@^hC]|CPbC{@dBi@nCt@~FDzCUzBvChFhArDzAfCt@vDtAbCj@|C}@n@}@Gq@m@eDkCm@y@o@IkAr@O|@b@tB[dB_BdBuExBaDq@y@Os@b@cAfEr@p@jClCiB~GyCbAo@B}AE?tBAlDB`Ap@xCaAxACjDtCjChAnAS~A`@fEv@zFt@\\pASzA}@rFTL\\@lBb@jCW`Cp@bA|C@hBv@t@fCCxI\\|BFNQVMCo@PcBpBEt@R|FyAvE{@~CkAtAiBlGk@xFdBdEc@hLKjD}ApBcAdAu@lCc@|CqBxCsDfFyCn@iEBkBdAkAxC{ErE]hA_C`B_ChBsAdD_EjCmCj@{A|@sAxCcDn@oCkAuAHwDnEwCLsDmAgFlA{BG}BL}ChCeGlEcEp@eFEsEl@mL~DoMnM{BrAqEmAiBNADIHKC}Hx@{DT_DYwGq@cBVgB|AoB~AiACyJgHi@gAiA{MYwKsAaDkAVu@r@iC|B_EyE}NiKeIuF{IwHcDsEkAoBeAc@gAHcAQ]u@`@oCgA_HyDwJiOwOeKqPgGyTaHag@sGm_@iQgd@}JwRok@aiAuB_DcIuJ{EsDuTgNoIaM{Ls\\_KuZoByODye@}A}LaGiO_QiS}UwViJsK_F}J}AuEiAuHq@cFsDoKgI{QcEwQ}AcVuCeIkC_FgOyWkIcPcC{HqC_OqDkSiUkqA}C{OGmFrByEvDcC~JaC|LgC`FuCzEeIdEsKrIcPdYod@ba@{o@zo@q_AdZob@vBmFb@qHyA}IeNgVaWoa@iRkYiCiGSsFlEuOxGaNlGaL`JwLxLeLpIyFdQgIvUmHxJqBlMe@jPxA`NtE~NrHjMjLlVfTdf@pc@~ElErBrECdIqBzFcAfBMbDtBlAjBy@LaEWiE^sIMkJvAaJ|AkHpFeX~FqN`HeEbEmDjByCjAkE|BkMzB}HzAOjFjFdHdJv@rDh@zDz@`B~@`Eb@jEtAnF`Cr@~A}DxAaF`@yCrBiAs@uBAwA|@gASv@Or@j@j@dAv@TfA\\DeA{CVcBz@kAQgB|@oAFsElC{B|DcBzAcBlC_AdAc@@qDbAuB`@AhDzMzD`IxClG^zDc@bDLzD|@pAn@FlBnBxAxAbBkB|@Y~CxCf@dCBzCw@|A_A@aAiC_FYsCtDj@hDQfByDtAy@pAoAzAkFo@_C~BgBjEuBv@uCM'),
(11, 1, 46, 'ChIJR1J4iXMABDQRqBwOAYY2gAo', 9, 7200, '19:28', 1, 1, NULL),
(11, 1, NULL, NULL, 10, 1316, '21:28', 4, 1, 'qy|fCoyuwT|ANt@AhAQb@Yf@o@n@kBf@{A^s@VSTIp@Q\\Ax@L~Bd@L@XIPMPc@XeA`@e@l@a@HCZA\\?ZGp@e@Pm@BU?]E]c@{@KUCUD_@Pe@zAqCLGRCfDIXF^NJNHRXxANNRHf@?\\QVi@V_ADa@AYKq@EuAI[S_@oAqAqAmA]GMBOLu@jAYZSLOBUCOIOQq@iBWc@]SUGs@EOGOKQUa@gAI[Ga@@g@Fm@b@{@F_@Bu@UuB?k@Ee@g@{AiAyBg@{@e@aAKa@Km@Wo@iAsAQ[]w@Sw@c@eBQaAe@oCMg@KSOQSGMBUXo@pAAVDZDb@KzAGTILOJS@_@AWD{@\\}@h@MLa@h@[\\[Va@Ni@DeCrAqAnAS\\ALBZP|@Af@EZITUTEF]f@ARFVDPDb@Od@SXu@x@KRANDR\\f@t@jB?PGHGBKECEIq@[m@MQME[K[SIKEYNe@Ta@?QIGG?MJWl@Un@AV@LbAxAHZCJKL[Pg@R_@RQXK\\Id@?d@GfASfAc@h@MPKb@Ed@@`@Qb@O`@Uh@]x@IRMFQCISMc@gAc@UOKIO]a@yBSwAKc@KUm@cAg@eAa@_Ac@gBEq@WcAu@qB]g@cAgA}@qAqAkAkBoBO]C_@Nu@VoAHa@AOCOoAeAeAq@]MUOS[EYD}@DMX]zA_C^k@f@m@La@P{@FgAC{AC_AIy@OiC?Y@_AXsCN{CVcEV{CBeBMcDe@eJ_@kIOkAa@eBq@{Bs@oCi@oAu@q@{@c@y@k@[C]g@i@q@s@oAm@}Bo@gBu@iBkBeBwAo@k@KaAIkADkdA`KiTtBwGl@sAT_APq@Fc@Ba@Em@KaAUaAa@gEyAwEwA_ASY?OHc@NMF]T]ZS\\QRKDK@IAMGOSCO@OJYv@c@f@Sz@Mv@E`A?|ErAX?~@FrBPbEVFA|@AvCLp@D`ABf@Gh@?H@TFLHV^Hh@Cd@GPQPUPKFh@l@|@fAHH'),
(11, 1, 27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 11, 7200, '21:50', 2, 1, NULL),
(11, 2, 27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 1, 7200, '09:00', 2, 1, NULL),
(11, 2, NULL, NULL, 2, 969, '11:00', 4, 1, 'qjbgCes{wTqB_CTQ@KASOOWCW?CAa@BaAL]H_AV_A`@}@Ra@Bs@Aq@OoAg@q@g@iAcAc@Wi@k@oAc@qEqAm@Cc@Pi@V_@XMd@I^A\\DZL\\x@xAXt@Nh@Dt@?j@AZk@tC{@hEuA`Gi@rCo@tCs@tC[z@m@lAmA`Be@b@w@j@w@n@_@h@I`@Ir@F~@N|APfCEjAYvBWpAc@p@y@n@a@Vy@Zq@LkCVgEj@kBR}@J}Hf@gE\\_ALsAPqCTw@Jg@Ng@Ve@^a@b@]h@IPUz@Kr@KtDKpAY`Ae@`Ac@p@SPi@\\SJ_@JiBZaAB}XVUB]L]L[PUT[b@kCtDmLzP_F~GgDjEoJvMwEtG[`@s@r@k@^_@P]Ls@PqBd@u@Zm@\\MLe@v@Ib@Iv@Dr@BXRx@v@lCtAvFBt@G`AEXGZKRg@j@yAbAa@Zo@t@Wd@Ux@Gh@u@xH_A`K]lDqA`L{@bJe@|EY`Be@tAcA`Bk@p@mA`AaG`D{EdCq@b@gAx@aAjAu@fAo@|AwBtIu@fCc@nA]n@S^u@`AsAnAo@d@w@^oCp@qBXgADg@@o@CaAKyAKoDe@sGwAwAS_BQqC?qAJw@Pu@ZmAr@]^qBzBaAjAeBjB}B`CwBdCyAxAmCpCeA`AoAdAyAr@_C`A}CdAuAb@cCbAcAb@cAj@gBzAy@|@u@bAq@fAO`AAP?^FTHN\\RV@^KRWL_@@UCi@[sB_@cAUeAU}@y@yDK_@[k@aAgA{D}Ci@U[Ka@Eg@C}BAc@G_@O_@UyCeByBqA{FeDm@[}@[u@Ma@Ey@CaBF}ANKVARZh@T`@r@bAb@f@VTTLj@ZDRDz@CZIx@IXYh@}B~B_@Zi@Xa@NYeA'),
(11, 2, 37, 'ChIJySAMrZL4AzQRSeamG7X-iQg', 3, 7200, '11:16', 1, 1, NULL),
(11, 2, NULL, NULL, 4, 1111, '13:16', 4, 1, 'qqpgCeapwTXdA`@Oh@Y^[~@_Ar@s@q@k@aA}@kAsAo@u@UM_As@_@S[EKAi@Bg@R[Zi@nA_@pA}@rBUXKDY@QHQTCJGRSZQJSF_@BQ?[G_@Q_@a@Ws@G_@?_@@OLa@VY\\Q`@EP?`@HNFf@K`@]l@{@x@mAf@i@|AmAx@e@`Bs@jAYdAWj@E`AKx@AfA?fAFb@Ft@P`Ab@zA|@pJvFlBlATJj@JtC@r@Fb@N\\Lz@n@|@r@~AhAVX\\b@T@LXJ^j@bCRRDLRVRHZ@b@GZUdBeAt@[zAe@hAUz@QN?j@U|@[rBq@x@W`Bq@r@e@rAmAxA{AxAcBtHcIlAoAfDyDvE_FZUTKb@Qp@MfAIh@A\\D`C`@rCv@~Dx@pAPt@BXEf@@fH^hA?j@Cn@G`@Gz@OZK`@Qj@a@xAsARIfB{Bt@yAj@{A`AaDh@kAbCoDb@c@~AiAdB}@hJqDpBs@bBq@lCwArAy@jBwAfA_AdAgAlAwAf@u@fB{CjBgE`CaIzAoFdDkLrCkKr@_D^wAXu@\\kAdAgEvBwGjDsJbA_C|BoEnCqEjByCl@s@fCeD~@cA~AeBpCqCfEmDVSd@UtEeD|@i@v@e@dAk@bB_AxB_AhFuBfJyCnJsCzBg@hAYrDo@zBS~COpDArDJnCTfFv@xEtAt@TpEhBvBx@`CnAdGhD|AnAtD`DvDxDdIjHfLzJzVdUtFbFrFfFfCpBvAzAhAhBVp@Pv@Lr@D|@Al@UdDGt@Oh@y@nB_@j@i@~@Yf@YdAA^BXHb@`@h@NLXLPDV@b@C^SXOLQNg@D[?e@Cq@Ce@QiAI{@BcATgFHkB@aAEuBA}AGuADwAL_AbAiERq@NKBSRkAHm@V_BhAcGvBaKPaAH[Cg@?cA?qAUcFKoB@iAFiANqB^kBl@{Ap@sAPUpB_DzBcErBkERc@rAiD`@gA`AoDnAqEx@oFb@wHt@eSM][a@e@e@}@o@uAq@K]CUCeBEsBM_D{ABMD'),
(11, 2, 29, 'ChIJ7QNny1gABDQRgc47Ya61z2Q', 5, 7200, '13:34', 1, 1, NULL),
(11, 2, NULL, NULL, 6, 1254, '15:34', 4, 1, 'yk_gCsrzwTUBII?IFGnAEp@BR@dCSfB[tAFtAIdAIrBGAOhBGlAELBDF?TIJUFYDmCLF`BXhJIjAS`D]jAI^AVBZ@vAHHDL?LFdCL\\PTZPp@Lx@P^VNXFVJtANlCD|@Dh@A\\Gd@GZg@zAgCpE]n@GXATDVPVrBnA|@r@~@hAfCfDrBjCb@t@Nd@Fb@BZFnBHn@Jb@Rl@P^~@|AN`@NxABf@Fz@H~@VbB\\nB@ZFTZ`@TLnAh@ZBRAHM`@cAf@uADe@Jc@LQb@i@RgAFgA?e@He@J]PY^Sf@SZQJMBKI[cAyAAM@WTo@Vm@LKF?HF?PU`@Od@DXHJZRZJLDLPZl@Hp@BDJDFCFI?Qu@kB]g@ES@OJSt@y@RYNe@Ec@EQGW@S\\g@DGTUHUD[@g@Q}@C[@MR]pAoAdCsAh@E`@OZWZ]`@i@LM|@i@z@]VE^@RANKHMFUJ{AEc@E[@Wn@qATYLCRFNPJRLf@d@nCP`Ab@dBRv@\\v@PZhArAVn@Jl@J`@d@`Af@z@hAxBf@zADd@?j@TtBCt@G^c@z@Gl@Af@F`@HZ`@fAPTNJNFr@DTF\\RVb@p@hBNPNHTBNCRMX[t@kANMLC\\FpAlAnApAR^HZDtAJp@@XE`@W~@Wh@]Pg@?SIOOYyAISKO_@OYGgDHSBMF{ApCQd@E^BTJTb@z@D\\?\\CTQl@q@d@[F]?[@IBm@`@a@d@YdAQb@QLYHMA_Ce@y@M]@q@PUHWR_@r@g@zAo@jBg@n@c@XiAPu@@eBOKBEF}@~FIf@]`Ag@h@{@k@wAaAg@[kAm@KKUBaB|@k@VM@MBc@Ee@GS@KL?VHf@AJKNQJGJ?P@PEPANDR~@^n@ZLLFHBREVINMRDRNx@BNENIPSNE`@I^e@XGP@LDHId@[h@GTFPNDt@JVL'),
(11, 2, 21, 'ChIJQ73aHHYABDQR5twO0q4bzM4', 7, 7200, '15:55', 1, 1, NULL),
(11, 2, NULL, NULL, 8, 1399, '17:55', 4, 1, 'qn}fCqvtwTWMu@KOEGQFURYFOHe@EIAMFQd@YH_@Da@ROHQDOCOOy@ESLSHODOC[UWo@[_A_@ES@ODQAc@NQHEJO@KEOCW?WJMRAhALZEnBcA\\QTCJJjAl@dAp@tBvAf@i@\\aA^eCl@iDJCdBNt@AHA~@OTKb@e@PWHUlAqD^s@VSTIp@Q\\Ax@L~Bd@L@XIPMPc@Ns@Ra@j@e@b@Ux@AZG^SPQFQLq@?]E]c@{@KUCUD_@Pe@zAqCLGRCjBEz@CXF^NJNHRXxANNRHf@?\\QVi@V_ADa@AYKq@Co@Ae@I[S_@UUsBsBWUMEOAMBOLU^_@j@YZSLOBUCOIOQq@iBWc@]SUGUA]COGOKQUa@gAI[Ga@@g@Fm@NURe@F_@Bu@K}@Iw@?k@Ee@Me@Yu@iAyBaAiBWu@Q_AQ]iAsAQ[]w@w@}Cw@qEMg@KSOQIEQ?E@k@kAM_@A_AAKc@}AQe@GGMEUAy@Ac@EiAQq@a@MQMc@UgAAQBQNk@d@eAFMJQjAc@|Aw@PEt@CLG~@u@TKTIr@Gp@Un@QNATBhAd@R?FCHKBI?I?Gc@oAe@uDGu@?_@FeAGyCIi@e@m@o@o@[OOAM?k@Lo@TK@MEKIQq@a@gAAOT}@@KAWGOk@cASk@Ka@F_@NUHEx@WV?x@PHC`@Kh@]TQNW^mARi@h@o@tAcBb@m@JMLGVCxAANEVOX_@r@oAR_@Rg@D_@AkAG[KYe@{@Om@?SF_@PgCFa@HYVa@Nq@RsALyAE}@?_AF]PYVSj@QZ_@\\YPEv@Ax@AZEj@Un@m@E?CAGI?KBE@ANEFDBB@D?B\\YZ[R_@V{@Pu@Da@?k@BU^w@|@}A`@s@?YEu@MaB?m@BOFIb@_@f@_@xAeDl@mA^s@b@m@^i@lByBzAiAfG_DbAa@hA_@p@Q`BUv@KRFRPNz@?n@GVKL_@P}@`@M\\AR@TP\\RXBLEZWn@G^@`@HjA?RENMRERAXDXvAjCXT|@`@vCjA^Hz@@fBB`@NNRFPHh@hAjDNT|@jBF?FDBD@F?BHTJ`AJn@HTPXHDt@Xl@Lb@?rFu@VBPJJJL\\Pr@Jf@ZT\\Dh@MZIh@GLCj@A^?\\BHFDHF|@@b@JPZB`BGFBNMP[PIPCTFPLH@HC^Kd@G^IPKPMPIN?XDHAJKH[AMEIOG[Ai@V[Js@HGAIMA[d@wAZ{ADe@DUb@[DG@OGSy@k@IIGS?MFOHCPLPZ\\X`@b@HPBVFTj@`@l@Vd@NAG@a@HeA@GSIUIS_@?A'),
(11, 2, 22, 'ChIJ0XbYFywABDQRAB7DjCemH7A', 9, 7200, '18:18', 1, 1, NULL),
(11, 2, NULL, NULL, 10, 877, '20:18', 4, 1, 'g~wfCw`}wTLZLH`@NGf@G~@BNxB~CJRHZDV?VG^Sd@c@t@SrAEd@Kh@Af@@PHPJNx@x@HPDXB~ACv@Gp@B^Fh@@d@Al@Hx@LjA@VCV]f@s@Zc@j@QdAW~@[h@_@b@mBvASTmAr@u@Vs@Tu@hA[n@gA`C[`@[V]J[Dk@@g@MSIWQa@a@Oc@Ms@QaCGi@Om@[o@AU_@c@_@YkEiCwDuBqCqAgCeAg@O_AO}ASm@CoCGsDIsMQcIKyFK{ACaGEuBEiHM}GKeCG_HImD?{@H{ARkAPuA^qHnBsAJyAIa@KUGo@[_CyBsBiBm@YUGc@Ia@Gs@CyJUa@@o@H_@JaAZwBr@k@T[P]f@[^MJa@JU?YGQMQ[I[AUDa@Hk@C]Og@KOOKsAq@USq@w@GAGBYq@kBeBwAo@k@KaAIkADkdA`KiTtBwGl@sAT_APq@Fc@Ba@Em@KaAUaAa@gEyAwEwA_ASY?OHc@NMF]T]ZS\\QRKDK@IAMGOSCO@OJYv@c@f@Sz@Mv@E`A?|ErAX?~@FrBPbEVFA|@AvCLp@D`ABf@Gh@?H@TFLHV^Hh@Cd@GPQPUPKFh@l@|@fAHH'),
(11, 2, 27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 11, 7200, '20:33', 2, 1, NULL),
(11, 3, 27, 'ChIJKYaYze8ABDQRlx3xy15WKaI', 1, 7200, '09:00', 2, 1, NULL),
(11, 3, NULL, NULL, 2, 1071, '11:00', 4, 1, 'qjbgCes{wTqB_CTQ@KASOOWCW?CAa@BaAL]H_AV_A`@}@Ra@Bs@Aq@OoAg@q@g@iAcAc@Wi@k@oAc@qEqAm@Cc@Ba@Hc@RcA|@y@bAGVU`@i@|@W^w@x@c@`@oAd@mA\\eC|@qFvCqBbAmA`A}@~@[Tk@Vs@L{AA}BQo@EkIgAw@[k@a@sBsBQKYKgC_@gAYs@_@sCsAyAU[Cy@@eAPq@PqAj@_C|Aq@f@WR{@R]@s@KiAa@i@Mw@CyADyCM_FIcBByCEg@EwAKiEIoCGmDMqN_@{Te@eBCkDOmHOeIQoBJ{AVgCl@aAXeATO@e@Ca@KWUQUO_@Gq@Fo@Rk@v@cBLq@Bc@Gy@Qg@k@s@e@Y]Kk@GqAFmGp@QDOHkCnBaHfFyItGmWnRqCpBiCjBoCzB}AbA}@j@a@Pu@Pm@?c@Ac@GgAa@YSUYu@mAwBmF{AcD_@k@aCeCoEqEwBqC}BaEi@q@sBiBOGSOW[i@w@w@gA[Ua@Ks@?}@Jc@H[LeAR[BgAEyAMqAIg@AmBFqBR}@RwA^{Ap@w@`@u@l@kCzBQTWl@?JAJQZWLO?QCa@FI@mAx@{B`BaEzCiAdAQ@gAn@cBv@qAt@UH[LwBhAmGnDc@RMAaAd@cA^]Hc@@m@H_@Bu@BAVIp@}@p@Yf@BNAFEJIFM?C?i@l@GFQ@MCeA]g@@_@CQ?CC'),
(11, 3, 38, 'ChIJ-f7e5aMHBDQR1Bz-AYFVvUg', 3, 7200, '11:17', 1, 1, NULL),
(11, 3, NULL, NULL, 4, 979, '13:17', 4, 1, 'ckrgCyizwTBBP?^Bf@AdA\\LBPAFGh@m@EIAE?CHWBAXe@DAR@|@q@Hq@@Wt@ClAMb@A\\IbA_@`Ae@f@g@hEcCjDiB`FgChB_Aj@bAFF\\v@^j@Z\\d@b@^T^LRNvDlA`Ct@jBn@fBz@fAt@rCtBlCpBn@b@~@z@r@l@jAxAjAbB^t@Th@`AhCxBbI`@fB|@dCbAhB~@|AlBzBl@h@~B|AhB`AdBn@zA^r@Jb@FlFj@pDn@bCp@lBj@xCvAdFtBfH`DhDfBxA|@`BjArAhA~B~BzChD~BdD|B~D`AlBlCxHh@jB~@~Dr@vE^jC\\jCPz@^`Br@`C^z@|AdCbDnEr@x@z@bAPZjA`BlAxAhAjAdA~@l@\\p@\\d@Pv@T~@TdBN~AC^EtASb@Kb@MpAg@l@WlAi@vB{@l@OdAOr@In@CfCD|CPb@@f@Kf@GhBInCItHKnC@`AMb@Sd@i@\\}@z@}BN_@`AiDtByGf@qAj@{A\\u@d@iAnCmFxAeC`AuAlCwDdCaDzBiCrA}AbB}At@m@bCwBVQlDsCpCsB`EmCvAcAzA_AdDaBjCcA~CaAdBo@rGiBvBm@bEc@h@@|COjAGh@?tCE~@KpBU@AhBWr@K^ChCHND\\HtBhARL\\RrAr@TH|@b@^FV?b@DfBn@zBt@bAVF@x@Db@LzCbATFh@}BjAaF@WAKEG]I?r@GZc@xACZDRb@Nr@ZfA~@D^CJUZ'),
(11, 3, 23, 'ChIJu873FJEABDQRUFCXT1r5Xmo', 5, 7200, '13:34', 1, 1, NULL),
(11, 3, NULL, NULL, 6, 822, '15:34', 4, 1, 'qacgC}zwwTT[BKE_@gA_As@[c@OESB[b@yAF[?s@\\HDF@JAVkA`Fi@|BCHUGsAa@mBc@aDk@}DsAmAe@WMYKDMVgAZsApAqF^gBuAJi@Ms@Gq@@qCJ}@TQLQDON_@TQPS\\Ql@Cr@Hx@L^NTd@`@x@j@DF@DdBp@nAXPPLLfCv@t@TpEhBvBx@`CnAdGhD|AnAtD`DvDxDdIjHfLzJzVdUtFbFrFfFfCpBvAzAhAhBVp@Pv@Lr@D|@Al@UdDGt@Oh@y@nB_@j@i@~@Yf@YdAA^BXHb@`@h@NLXLPDV@b@C^SXOLQNg@D[?e@Cq@Ce@QiAI{@BcATgFHkB@aAEuBA}AGuADwAL_AbAiERq@NKBSRkAHm@V_BhAcGhAmF|AsHj@}AnAgC\\}@`AwCVe@JOr@e@d@OTIf@UhCoBPM?AJUfAeAdAeAt@}@TKJ?JDDH@HC\\y@t@i@^u@t@{@n@_@PaBlA@VFNdA|A`BhCXd@_@`@{BxD]f@yAxA'),
(11, 3, 36, 'ChIJEXMJ7XwABDQRHkQ2_q-FDnM', 7, 7200, '15:47', 1, 1, NULL),
(11, 3, NULL, NULL, 8, 749, '17:47', 4, 1, 'qo_gCuqvwT_@d@a@|@GTe@`A_ArBeEs@gBYQKGGBGRw@Rw@Pw@RmAAICUCKQm@I_A?a@MsAMs@E[EcA?]JeBNwATsATaA^gAn@yAr@oAp@cAbA_B`@u@`DeG`CyFr@oBnAsE`AmDRqAd@}CPqCPeDt@eSA{C?aECeDQuHCiBi@kKWgFQ{C]iHcAaIi@{Ea@wBi@sBo@qBaA{Bk@_Am@}@qFiGkNmM_KiJgBaBuAaBoAiAq@gAe@aAi@iAw@uCUwAOaBWeC]gC[sCCcB?eBEw@Ce@Gc@i@{DaAaIOoD?aCHoCHoCFk@PuAh@wBvAwEv@eD\\kA^y@tAaCvBeDdBuCrBcEx@mBNi@fA{Ez@mFxAoIPo@d@iD`@aBRwAPmCNoA^kAz@}An@e@h@[j@Uh@Kr@Ip@ChEH^BrA@`@E~AWpAk@fFwDtDmCf@i@j@{@Vg@\\aAl@eBTq@Ps@hAaBpBwBnA_BP]R}@HqAAYK_AOu@_@s@Q_@g@g@g@]m@UiAUgBQy@SkA[k@]u@w@c@k@[k@_@{@Kk@QgAGsA@_ABq@No@XmADO'),
(11, 3, 43, 'ChIJAXf8fX4BBDQRxWH9GL2vp3o', 9, 7200, '18:00', 1, 1, NULL),
(11, 3, NULL, NULL, 10, 1491, '20:00', 4, 1, '{a_gC{gfxTd@eAXe@t@y@TWx@i@lBeAp@SvFsDx@e@zAg@zAW|@MbBYb@Mx@a@`Ae@~D{ClDsC|@g@zAm@~A[jAEnADtBV~ATbDj@|Cl@hA`@dBz@b@TnC~@v@PrAP|BDtAKdBOdBKl@Db@FhBb@jAHz@Il@Oj@WPCFGTGZ@^FP^JZDd@CNQTKHG@Y?OCUMWa@q@Qc@CiADk@Cq@KwBc@iAA}CPe@BgADoA?g@A}ASqBg@gBq@kA]oDm@{@SUM}Bs@kD{@cAOcAGuA?eAPe@HaBl@cAf@cBxAcD~BwAjAkAp@uAl@e@JwBXiAPaAVy@`@aCtAyDfC[NuAbAsAhAs@t@q@fA]x@Uv@E`@OjB@pAJv@V|@Vr@P\\d@r@n@l@BD|Av@|A\\bCVXDv@`@v@j@h@j@FJZ`AZjB@fBEj@Ih@Sp@g@~@{CtCQP_AxAc@|@iBzE_@v@u@~@MN_@b@yB`BWR{DrC{AjAe@RcAXu@HkAHy@AkFEmAJWH{@^i@^q@fAa@v@Qh@Q~@I`BkAdK]vD_@nC]`C[rAi@jBi@dBm@bBaBbDsBfE_A`BsBxCq@dAg@~@]|@_@bAQv@gA|FkBvJe@|BQfBIjC@n@^tE~AvLFz@FhEJbBhApJf@`Db@dB\\|@l@jAt@|@r@|@~AbBxD|DbBhB\\\\n@d@rCfCzAxAXRfAn@`@VjAl@|@H`DNL@pAPhAVz@f@b@j@\\j@f@`AVv@d@rBf@lDRlA^n@rAbBn@v@jAnB^v@r@xBn@|BrB|HLJFPlAlDt@lCBVAVIXU\\YLWBUCYMgAcBqBuC_@u@i@qBo@kB_@_AYq@aB_Bc@UsAg@cAKmA@aNpAg_AdJqQbBiAJcAP{AXcAFm@GcAS_A[aBo@iBm@eFaB{@Sm@Cy@\\s@d@m@x@YNUCSSEM?ODSDM^WXMPGl@M|@Mv@Cd@@|ErAr@@pAJxGf@vGXz@BtAIl@APBh@Pf@V~@z@`AhAbE~EJVDd@`E`GZJjA|A|ApBn@xAf@pA`@bAHb@^~BRvB@lB@tAB~@@h@?vBRhB?d@L|BDh@Nd@FPHLVNd@JPFHHDLCLIFQASOy@s@IIMYOu@K{@Q}BM_DCuAMAOBED@J'),
(11, 3, 33, 'ChIJdRlVSfIABDQRq5S65hPQo-8', 11, 7200, '20:25', 2, 1, NULL),
(11, 4, 33, 'ChIJdRlVSfIABDQRq5S65hPQo-8', 1, 7200, '09:00', 2, 1, NULL),
(11, 4, NULL, NULL, 2, 1701, '11:00', 4, 1, 'inagCgezwTBHNBN?Aa@Eu@Ae@QwFOiBIo@]wAUk@g@qAw@cBc@s@iB_Cc@g@cFiGs@cAC?C?KIYW[YgAyA_AmAk@g@i@U_@Ey@Cw@HsBX{@TeA`@]Le@Jw@Bq@G]IsAg@{BkBy@k@SW]MyC_A}@W_ASY?OHc@NMF]T]ZS\\QRKDK@IAMGOSCO@OJYv@c@f@Sz@Mv@E`A?|ErAlAb@tBt@f@JfCTpCLn@@v@AnEa@~Hu@bJ{@ze@uE|\\cDbE]n@Cd@B`@Fr@RfAl@|@p@j@v@zBdC\\Rh@N`Ad@p@r@HPf@tAl@xBDRZbAz@zALb@Z\\r@rCp@lDXlC\\`HBt@j@lLFzAKfDQrDKrCIpAe@lCDhBLv@LhBNhBB`BOpA]fA_AbBq@vAo@nAEb@?PL^\\d@rAjAn@n@lBfCdDfEh@p@Zh@Nd@BLFl@?f@PzBd@`Bl@~@b@z@V~A@TFn@FhAT`B^|BFp@Th@VTTJ|@^RFX?HADGLYr@iBLo@BQJc@V[RUNi@LoA@cALm@Pg@ZUhAg@LKHM@KKU]g@U]Q_@?MDWTg@Xq@JCJBBFAP_@n@E`@JP^Xh@PZd@Rn@B^FFJ?LQI_@m@yASYMWAQDO`@i@Z[T[HSBOASESI[CSHSX_@X[La@Bi@Ca@Ok@CSBQHSb@e@|@y@j@[zAu@n@Gb@Uf@m@n@u@~@k@b@S`@KXCb@@HEPON_A@iAG_@AWFUt@yAJINAXPTb@x@tEz@lD`@dAfAvAZb@LVD\\Lj@N`@|@`Bt@tAh@pANd@Jd@BrAN`A@x@En@ITUb@Mb@Ch@Ft@Vv@Rj@PTVNTDn@DZL\\\\~@dCRNPDPAPGPOf@o@h@y@JEP?L@NJ|A|AdAhAL^BX@p@Hl@Fb@A`@Kf@[|@[^]Fa@EQMGGS}@Ke@GOWS[IYCqCFSBOBMNaB|CI`@@b@d@`AL`@@\\Eh@M^ILSNULQDW@a@?YHu@h@Y`@a@zAMNYJO@oAWuAYo@CUDs@TULQTc@dAq@pBM`@Yh@YZ]TYFkANwBSO@KHi@`DYrBUz@]j@WV]U{@k@wA_A_@W{@c@EEM?MFwBhAc@JY?k@KUAOHER@XDP@NEJKJGBKHCJBTGh@DRb@Nt@\\`@XDDDN@LAHMVMTNv@Hd@IXQLGHCNE`@ENQLWPAXDHE\\CHS\\O\\@JPL`@Dd@LPVL\\DPAHKNQDc@@}A]IGQ_@m@qB]}AGWMQSC_AFGAIKGQA_@Bm@DS'),
(11, 4, 44, 'ChIJsd2-34n_AzQROJPZYjyLMS4', 3, 7200, '11:28', 1, 1, NULL),
(11, 4, NULL, NULL, 4, 1698, '13:28', 4, 1, '{y}fCkauwTIf@?h@FZBHHHL@^Ed@ANLFNLp@XhAr@zBHHVHpAVb@ANIHQ?GQi@ISWMu@KOEGQFUZi@He@EIAMFQd@YH_@Da@ROHQDOCOOy@ESLSHODWCSGIMMo@[_A_@ES@ODQAQ?QFKPKJO@KIg@?WJMRAd@Fb@DLCLAj@W`B}@TCJJjAl@f@ZvA`Az@j@f@i@\\aAHg@|@_GDGJCdBNt@AhAQb@Yf@o@n@kBf@{A^s@VSTIp@Q\\Ax@L~Bd@L@XIPMPc@XeA`@e@l@a@HCZA\\?ZGp@e@Pm@BU?]E]c@{@KUCUD_@Pe@zAqCLGRCfDIXF^NJNHRXxANNRHf@?\\QVi@V_ADa@AYKq@EuAI[S_@oAqAqAmA]GMBOLu@jAYZSLOBUCOIOQq@iBWc@]SUGs@EOGOKQUa@gAI[Ga@@g@Fm@b@{@F_@Bu@UuB?k@Ee@g@{AiAyBg@{@e@aAKa@Km@Wo@iAsAQ[]w@Sw@c@eBQaAe@oCMg@KSOQSGMBUXo@pAAVDZDb@KzAGTILOJS@_@AWD{@\\}@h@MLa@h@[\\[Va@Ni@DeCrAqAnAS\\ALBZP|@Af@EZITUTEF]f@ARFVDPDb@Od@SXu@x@KRANDR\\f@t@jB?PGHGBKECEIq@[m@MQME[K[SIKEYNe@Ta@?QIGG?MJWl@Un@AV@LbAxAHZCJKL[Pg@R_@RQXK\\Id@?d@GfASfAc@h@MPKb@Ed@@`@Qb@O`@Uh@]x@IRMFQCISMc@gAc@UOKIO]a@yBSwAKc@KUm@cAg@eAa@_Ac@gBEq@WcAu@qB]g@cAgA}@qAqAkAkBoBO]C_@Nu@VoAHa@AOCOoAeAeAq@]MUOS[EYD}@DMX]zA_C^k@f@m@La@P{@FgAC{AC_AIy@OiC?Y@_AXsCN{CVcEV{CBeBMcDe@eJ_@kIOkAa@eBq@{Bs@oCi@oAu@q@{@c@y@k@[C]g@i@q@s@oAm@}Bo@gBu@iBkBeBwAo@k@KaAIkADkdA`KiTtBwGl@sAT_APq@Fc@Ba@Em@KaAUaAa@gEyAwEwA_ASY?OHc@NMF]TMJGVK\\E^@ZJ^l@jA`@t@XbADt@A\\@ZC\\Qz@sAjGIt@iAvEI|@YnAKp@JfANlAVx@^r@bArA`DeAXInAG'),
(11, 4, 45, 'ChIJgZy3ZekABDQRD5GGwRqViAo', 5, 7200, '13:56', 1, 1, NULL),
(11, 4, NULL, NULL, 6, 613, '15:56', 4, 1, 'wkcgCcozwToAFYHaDdAOHcAwAk@iAQe@a@]i@a@Hc@Re@H_@nAkGNUl@yCJ_@~@wEL}@Bk@Cg@Gs@]}@Sm@Ya@}@iAw@u@cA[a@Gu@GWFQNIV@^HPRJZF`@G^Sb@c@\\Ub@c@lAqA`@[RO`@Iv@E`A?|ErAlAb@tBt@f@JfCTpCLn@@v@AnEa@~Hu@bJ{@ze@uE|\\cDbE]n@Cd@B`@Fr@RfAl@|@p@j@v@zBdC\\Rh@N`Ad@p@r@HPf@tAl@xBDRZbAz@zALb@l@fDB`@ATEXINc@XsA\\GDAP?fAHnCTbHBz@`@jMIjAMzB'),
(11, 4, 47, 'ChIJrWScMlwABDQR41dJWC_pVcg', 7, 7200, '16:06', 1, 1, NULL),
(11, 4, NULL, NULL, 8, 218, '18:06', 4, 1, 'or~fCe}ywTYCSL_@Z]t@EJER@vAHHDL?LFdCL\\PTZPp@Lx@P^VNXFVJtANlCD|@Dh@A\\Gd@GZg@zA{@~AiB`DGXATDVPVrBnA|@r@~@hAfCfDrBjCb@t@Nd@Fb@BZFnBHn@Jb@CZKPQ?SK[u@Y{@PSHENBHDJLDN@D'),
(11, 4, 49, 'ChIJx_WyiXMABDQRJnFIJdc19Kw', 9, 7200, '18:10', 1, 1, NULL),
(11, 4, NULL, NULL, 10, 682, '20:10', 4, 1, 'mb~fCewwwTGUSQMEKBCBOPGM}@aAaAoAWa@QKsBuB}@aAK_@?_@XqAR_A@OAMAGSUg@e@u@g@e@YOEQIWSO]Ac@Bk@DMbAwA`AyANWf@m@Ro@NeABuAGuBWyCAeBJ_BTiBHcCV_ER{BF}ACyAMkCEaAaA_SKm@_@}Ai@_BGa@s@iCa@_AGO_@[UU]Ow@e@_@Y[AIM_@g@q@_A_@u@i@qBo@kB_@_AYq@aB_Bc@UsAg@u@Km@AuAHwVbCkz@hIyNrAkB\\s@LcAFm@GcAS_A[aBo@yDqAqEqAm@Cc@Pi@V_@X[^QXOJSBYOKU?ODSDM^WXMPGl@M|@Mv@Cd@@|ErAr@@|In@NCrA@tCNvADlAIRDTHXVLb@Bf@IZKRULUPxAbBVZ'),
(11, 4, 12, 'ChIJncZGzPPiAzQRnjaSGIKQ9fk', 12, 7200, '22:21', 3, 1, NULL),
(21, 0, 12, NULL, 0, 120, '09:09', 0, 0, NULL),
(21, 0, 27, NULL, 0, NULL, '20:21', 3, 0, NULL),
(21, 1, 17, NULL, 1, 120, '11:11', 1, 0, NULL),
(21, 1, 18, NULL, 2, 120, '13:13', 1, 0, NULL),
(21, 1, 25, NULL, 3, 120, '16:16', 1, 0, NULL),
(21, 1, 46, NULL, 4, 120, '19:19', 1, 0, NULL),
(21, 2, 37, NULL, 1, 120, '11:11', 1, 0, NULL),
(21, 2, 29, NULL, 2, 120, '13:13', 1, 0, NULL),
(21, 2, 21, NULL, 3, 120, '15:15', 1, 0, NULL),
(21, 2, 22, NULL, 4, 120, '18:18', 1, 0, NULL),
(21, 3, 38, NULL, 1, 120, '11:11', 1, 0, NULL),
(21, 3, 23, NULL, 2, 120, '13:13', 1, 0, NULL),
(21, 3, 36, NULL, 3, 120, '15:15', 1, 0, NULL),
(21, 3, 43, NULL, 4, 120, '18:18', 1, 0, NULL),
(21, 4, 44, NULL, 1, 120, '11:11', 1, 0, NULL),
(21, 4, 45, NULL, 2, 120, '13:13', 1, 0, NULL),
(21, 4, 47, NULL, 3, 120, '16:16', 1, 0, NULL),
(21, 4, 49, NULL, 4, 120, '18:18', 1, 0, NULL),
(21, 1, 27, NULL, -1, NULL, NULL, 2, 0, NULL),
(21, 2, 27, NULL, -1, NULL, NULL, 2, 0, NULL),
(21, 3, 33, NULL, -1, NULL, NULL, 2, 0, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `type` char(1) CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Lang` char(2) CHARACTER SET utf8 DEFAULT NULL,
  `secret` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `action_time` timestamp NULL DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `req_recovery` tinyint(1) DEFAULT 0,
  `req_activate` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`userID`, `email`, `name`, `password`, `type`, `Lang`, `secret`, `action_time`, `activated`, `banned`, `req_recovery`, `req_activate`) VALUES
(1, 'nixon123465@gmail.com', 'nixon', 'Pa$$w0rd', 'N', 'ZH', '93cd6793c954e697757691a035745491', '2020-05-19 16:27:16', 1, 0, 0, 1),
(5, 'email', 'name', 'password', 'N', NULL, NULL, '2020-05-19 16:55:40', 0, 0, 0, 1),
(6, 'a', 'a', 'a', 'N', NULL, NULL, '2020-05-19 16:58:59', 0, 0, 1, 1),
(7, 'admin@hochilltrip.com', 'admin', 'Pa$$w0rd', 'A', 'ZH', NULL, NULL, 1, 0, 0, 0),
(8, 'sam.20156@gmail.com', 't1', 't1', 'N', NULL, NULL, '2020-05-21 16:45:09', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `userrate_attraction`
--

CREATE TABLE `userrate_attraction` (
  `attractionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `userrate_attraction`
--

INSERT INTO `userrate_attraction` (`attractionID`, `userID`, `rating`) VALUES
(29, 1, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `userrate_blog`
--

CREATE TABLE `userrate_blog` (
  `blogID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `userrate_blog`
--

INSERT INTO `userrate_blog` (`blogID`, `userID`, `rating`) VALUES
(8, 7, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `user_plan`
--

CREATE TABLE `user_plan` (
  `userID` int(11) NOT NULL,
  `planID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_plan`
--

INSERT INTO `user_plan` (`userID`, `planID`) VALUES
(1, 12),
(7, 12);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `attraction`
--
ALTER TABLE `attraction`
  ADD PRIMARY KEY (`attractionID`),
  ADD UNIQUE KEY `googleId` (`googleId`),
  ADD KEY `attraction_countryID_fk` (`countryID`);

--
-- 資料表索引 `attraction_comment`
--
ALTER TABLE `attraction_comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `attraction_comment_attractionID_fk` (`attractionID`),
  ADD KEY `attraction_comment_userID_fk` (`userID`);

--
-- 資料表索引 `attraction_type`
--
ALTER TABLE `attraction_type`
  ADD PRIMARY KEY (`id`,`type`);

--
-- 資料表索引 `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogID`),
  ADD UNIQUE KEY `planID` (`planID`,`userID`),
  ADD KEY `blog_planID_fk` (`planID`),
  ADD KEY `blog_userID_fk` (`userID`);

--
-- 資料表索引 `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `blog_comment_blogID_fk` (`blogID`),
  ADD KEY `blog_comment_userID_fk` (`userID`);

--
-- 資料表索引 `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`),
  ADD UNIQUE KEY `EN` (`EN`),
  ADD UNIQUE KEY `ZH` (`ZH`);

--
-- 資料表索引 `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`planID`),
  ADD KEY `plan_countryID_fk` (`countryID`);

--
-- 資料表索引 `plan_content`
--
ALTER TABLE `plan_content`
  ADD KEY `plan_content_planID_fk` (`planID`),
  ADD KEY `plan_content_attractionID_fk` (`attractionID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- 資料表索引 `userrate_attraction`
--
ALTER TABLE `userrate_attraction`
  ADD PRIMARY KEY (`attractionID`,`userID`),
  ADD KEY `userrate_attraction_userID_fk` (`userID`);

--
-- 資料表索引 `userrate_blog`
--
ALTER TABLE `userrate_blog`
  ADD PRIMARY KEY (`blogID`,`userID`),
  ADD KEY `userrate_blog_userID_fk` (`userID`);

--
-- 資料表索引 `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`userID`,`planID`),
  ADD KEY `user_plan_planID_fk` (`planID`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `attraction`
--
ALTER TABLE `attraction`
  MODIFY `attractionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `attraction_comment`
--
ALTER TABLE `attraction_comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `blog`
--
ALTER TABLE `blog`
  MODIFY `blogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `plan`
--
ALTER TABLE `plan`
  MODIFY `planID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 已傾印資料表的限制(constraint)
--

--
-- 資料表的限制(constraint) `attraction`
--
ALTER TABLE `attraction`
  ADD CONSTRAINT `attraction_countryID_fk` FOREIGN KEY (`countryID`) REFERENCES `country` (`countryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制(constraint) `attraction_comment`
--
ALTER TABLE `attraction_comment`
  ADD CONSTRAINT `attraction_comment_attractionID_fk` FOREIGN KEY (`attractionID`) REFERENCES `attraction` (`attractionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attraction_comment_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制(constraint) `attraction_type`
--
ALTER TABLE `attraction_type`
  ADD CONSTRAINT `attraction_type_id_fk` FOREIGN KEY (`id`) REFERENCES `attraction` (`attractionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制(constraint) `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_planID_fk` FOREIGN KEY (`planID`) REFERENCES `plan` (`planID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制(constraint) `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `blog_comment_blogID_fk` FOREIGN KEY (`blogID`) REFERENCES `blog` (`blogID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_comment_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制(constraint) `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_countryID_fk` FOREIGN KEY (`countryID`) REFERENCES `country` (`countryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制(constraint) `plan_content`
--
ALTER TABLE `plan_content`
  ADD CONSTRAINT `plan_content_attractionID_fk` FOREIGN KEY (`attractionID`) REFERENCES `attraction` (`attractionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_content_planID_fk` FOREIGN KEY (`planID`) REFERENCES `plan` (`planID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制(constraint) `userrate_attraction`
--
ALTER TABLE `userrate_attraction`
  ADD CONSTRAINT `userrate_attraction_attractionID_fk` FOREIGN KEY (`attractionID`) REFERENCES `attraction` (`attractionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userrate_attraction_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制(constraint) `userrate_blog`
--
ALTER TABLE `userrate_blog`
  ADD CONSTRAINT `userrate_blog_blogID_fk` FOREIGN KEY (`blogID`) REFERENCES `blog` (`blogID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userrate_blog_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制(constraint) `user_plan`
--
ALTER TABLE `user_plan`
  ADD CONSTRAINT `user_plan_planID_fk` FOREIGN KEY (`planID`) REFERENCES `plan` (`planID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_plan_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
