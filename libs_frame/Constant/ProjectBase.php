<?php
/**
 * Created by PhpStorm.
 * User: 姜伟
 * Date: 2018/9/1 0001
 * Time: 15:02
 */
namespace Constant;

use Traits\SimpleTrait;

class ProjectBase {
    use SimpleTrait;

    //数据常量
    const DATA_KEY_SESSION_TOKEN = 'sytoken'; //键名-session标识
    const DATA_KEY_CACHE_UNIQUE_ID = self::REDIS_PREFIX_UNIQUE_ID . 'uniqueid'; //键名-缓存唯一ID

    //公共常量
    const COMMON_PAGE_DEFAULT = 1; //默认页数
    const COMMON_LIMIT_DEFAULT = 10; //默认分页限制

    //REDIS常量 后五位全数字的前缀为框架内部前缀
    const REDIS_PREFIX_SESSION = 'sy' . SY_PROJECT . '00001_'; //前缀-session
    const REDIS_PREFIX_SESSION_LIST = 'sy' . SY_PROJECT . '00002_'; //前缀-session列表
    const REDIS_PREFIX_UNIQUE_ID = 'sy' . SY_PROJECT . '00003_'; //前缀-唯一ID
    const REDIS_PREFIX_MESSAGE_QUEUE = 'sy' . SY_PROJECT . '10000_'; //前缀-消息队列
    const REDIS_PREFIX_MESSAGE_KAFKA_OFFSET = 'sy' . SY_PROJECT . '10001_'; //前缀-kafka消息位移缓存
    const REDIS_PREFIX_WX_ACCOUNT = 'sy' . SY_PROJECT . '10100_'; //前缀-微信公众号
    const REDIS_PREFIX_WX_COMPONENT_ACCOUNT = 'sy' . SY_PROJECT . '10101_'; //前缀-微信开放平台账号
    const REDIS_PREFIX_WX_COMPONENT_AUTHORIZER = 'sy' . SY_PROJECT . '10102_'; //前缀-微信开放平台授权公众号
    const REDIS_PREFIX_WX_PROVIDER_CORP_ACCOUNT = 'sy' . SY_PROJECT . '10103_'; //前缀-企业微信服务商账号
    const REDIS_PREFIX_WX_PROVIDER_CORP_ACCOUNT_SUITE = 'sy' . SY_PROJECT . '10104_'; //前缀-企业微信服务商套件
    const REDIS_PREFIX_WX_PROVIDER_CORP_AUTHORIZER = 'sy' . SY_PROJECT . '10105_'; //前缀-服务商授权企业微信
    const REDIS_PREFIX_WX_CORP = 'sy' . SY_PROJECT . '10106_'; //前缀-企业微信
    const REDIS_PREFIX_PRINT_FEYIN_ACCOUNT = 'sy' . SY_PROJECT . '10200_'; //前缀-飞印打印账号
    const REDIS_PREFIX_DINGTALK_PROVIDER_ACCOUNT = 'sy' . SY_PROJECT . '10300_'; //前缀-企业钉钉服务商账号
    const REDIS_PREFIX_DINGTALK_PROVIDER_ACCOUNT_SUITE = 'sy' . SY_PROJECT . '10301_'; //前缀-企业钉钉服务商套件
    const REDIS_PREFIX_DINGTALK_PROVIDER_AUTHORIZER = 'sy' . SY_PROJECT . '10302_'; //前缀-服务商授权企业钉钉
    const REDIS_PREFIX_DINGTALK_CORP = 'sy' . SY_PROJECT . '10303_'; //前缀-企业钉钉

    //校验器常量
    const VALIDATOR_STRING_TYPE_REQUIRED = 'string_required'; //字符串类型-必填
    const VALIDATOR_STRING_TYPE_MIN = 'string_min'; //字符串类型-最小长度
    const VALIDATOR_STRING_TYPE_MAX = 'string_max'; //字符串类型-最大长度
    const VALIDATOR_STRING_TYPE_REGEX = 'string_regex'; //字符串类型-正则表达式
    const VALIDATOR_STRING_TYPE_PHONE = 'string_phone'; //字符串类型-手机号码
    const VALIDATOR_STRING_TYPE_TEL = 'string_tel'; //字符串类型-联系方式
    const VALIDATOR_STRING_TYPE_EMAIL = 'string_email'; //字符串类型-邮箱
    const VALIDATOR_STRING_TYPE_URL = 'string_url'; //字符串类型-URL链接
    const VALIDATOR_STRING_TYPE_JSON = 'string_json'; //字符串类型-JSON
    const VALIDATOR_STRING_TYPE_SIGN = 'string_sign'; //字符串类型-请求签名
    const VALIDATOR_STRING_TYPE_BASE_IMAGE = 'string_baseimage'; //字符串类型-base64编码图片
    const VALIDATOR_STRING_TYPE_IP = 'string_ip'; //字符串类型-IP
    const VALIDATOR_STRING_TYPE_LNG = 'string_lng'; //字符串类型-经度
    const VALIDATOR_STRING_TYPE_LAT = 'string_lat'; //字符串类型-纬度
    const VALIDATOR_STRING_TYPE_NO_JS = 'string_nojs'; //字符串类型-不允许js脚本
    const VALIDATOR_STRING_TYPE_NO_EMOJI = 'string_noemoji'; //字符串类型-不允许emoji表情
    const VALIDATOR_STRING_TYPE_ZH = 'string_zh'; //字符串类型-中文,数字,字母
    const VALIDATOR_STRING_TYPE_ALNUM = 'string_alnum'; //字符串类型-数字,字母
    const VALIDATOR_STRING_TYPE_ALPHA = 'string_alpha'; //字符串类型-字母
    const VALIDATOR_STRING_TYPE_DIGIT = 'string_digit'; //字符串类型-数字
    const VALIDATOR_STRING_TYPE_LOWER = 'string_lower'; //字符串类型-小写字母
    const VALIDATOR_STRING_TYPE_UPPER = 'string_upper'; //字符串类型-大写字母
    const VALIDATOR_STRING_TYPE_DIGIT_LOWER = 'string_digitlower'; //字符串类型-数字,小写字母
    const VALIDATOR_STRING_TYPE_DIGIT_UPPER = 'string_digitupper'; //字符串类型-数字,大写字母
    const VALIDATOR_STRING_TYPE_SY_TOKEN = 'string_sytoken'; //字符串类型-框架令牌
    const VALIDATOR_INT_TYPE_REQUIRED = 'int_required'; //整数类型-必填
    const VALIDATOR_INT_TYPE_MIN = 'int_min'; //整数类型-最小值
    const VALIDATOR_INT_TYPE_MAX = 'int_max'; //整数类型-最大值
    const VALIDATOR_INT_TYPE_IN = 'int_in'; //整数类型-取值枚举
    const VALIDATOR_INT_TYPE_BETWEEN = 'int_between'; //整数类型-取值区间
    const VALIDATOR_DOUBLE_TYPE_REQUIRED = 'double_required'; //浮点数类型-必填
    const VALIDATOR_DOUBLE_TYPE_MIN = 'double_min'; //浮点数类型-最小值
    const VALIDATOR_DOUBLE_TYPE_MAX = 'double_max'; //浮点数类型-最大值
    const VALIDATOR_DOUBLE_TYPE_BETWEEN = 'double_between'; //浮点数类型-取值区间

    //微信开放平台常量
    const WX_COMPONENT_AUTHORIZER_STATUS_CANCEL = 0; //授权公众号状态-取消授权
    const WX_COMPONENT_AUTHORIZER_STATUS_ALLOW = 1; //授权公众号状态-允许授权
    const WX_COMPONENT_AUTHORIZER_OPTION_TYPE_AUTHORIZED = 1; //授权公众号操作类型-允许授权
    const WX_COMPONENT_AUTHORIZER_OPTION_TYPE_UNAUTHORIZED = 2; //授权公众号操作类型-取消授权
    const WX_COMPONENT_AUTHORIZER_OPTION_TYPE_AUTHORIZED_UPDATE = 3; //授权公众号操作类型-更新授权

    //企业微信服务商常量
    const WX_PROVIDER_CORP_AUTHORIZER_STATUS_CANCEL = 0; //企业微信状态-取消授权
    const WX_PROVIDER_CORP_AUTHORIZER_STATUS_ALLOW = 1; //企业微信状态-允许授权
    const WX_PROVIDER_CORP_AUTHORIZER_OPTION_TYPE_AUTH_CREATE = 1; //企业微信操作类型-成功授权
    const WX_PROVIDER_CORP_AUTHORIZER_OPTION_TYPE_AUTH_CANCEL = 2; //企业微信操作类型-取消授权
    const WX_PROVIDER_CORP_AUTHORIZER_OPTION_TYPE_AUTH_CHANGE = 3; //企业微信操作类型-变更授权

    //微信配置常量
    const WX_CONFIG_STATUS_DISABLE = 0; //状态-无效
    const WX_CONFIG_STATUS_ENABLE = 1; //状态-有效
    const WX_CONFIG_CORP_STATUS_DISABLE = 0; //企业微信状态-无效
    const WX_CONFIG_CORP_STATUS_ENABLE = 1; //企业微信状态-有效

    //支付宝支付常量
    const ALI_PAY_STATUS_DISABLE = 0; //状态-无效
    const ALI_PAY_STATUS_ENABLE = 1; //状态-有效

    //钉钉配置常量
    const DINGTALK_CONFIG_CORP_STATUS_DISABLE = 0; //企业钉钉状态-无效
    const DINGTALK_CONFIG_CORP_STATUS_ENABLE = 1; //企业钉钉状态-有效

    //本地缓存常量
    const LOCAL_CACHE_TAG_WX_ACCOUNT = '001'; //标识-微信账号
    const LOCAL_CACHE_TAG_WXOPEN_AUTHORIZER = '002'; //标识-微信开放平台授权者

    //时间常量
    const TIME_EXPIRE_LOCAL_USER_CACHE = 300; //超时时间-本地用户缓存,单位为秒
    const TIME_EXPIRE_LOCAL_API_SIGN_CACHE = 300; //超时时间-本地api签名缓存,单位为秒
    const TIME_EXPIRE_LOCAL_WXACCOUNT_REFRESH = 600; //超时时间-本地微信账号更新,单位为秒
    const TIME_EXPIRE_LOCAL_WXACCOUNT_CLEAR = 3600; //超时时间-本地微信账号清理,单位为秒
    const TIME_EXPIRE_LOCAL_WXCORP_REFRESH = 600; //超时时间-本地企业微信更新,单位为秒
    const TIME_EXPIRE_LOCAL_WXCORP_CLEAR = 3600; //超时时间-本地企业微信清理,单位为秒
    const TIME_EXPIRE_LOCAL_WXCACHE_CLEAR = 300; //超时时间-本地微信缓存清理,单位为秒
    const TIME_EXPIRE_LOCAL_ALIPAY_REFRESH = 600; //超时时间-本地支付宝支付更新,单位为秒
    const TIME_EXPIRE_LOCAL_ALIPAY_CLEAR = 3600; //超时时间-本地支付宝支付清理,单位为秒
    const TIME_EXPIRE_LOCAL_DINGTALK_CORP_REFRESH = 600; //超时时间-本地企业钉钉更新,单位为秒
    const TIME_EXPIRE_LOCAL_DINGTALK_CORP_CLEAR = 3600; //超时时间-本地企业钉钉清理,单位为秒
    const TIME_EXPIRE_SESSION = 259200; //超时时间-session,单位为秒
    const TIME_TASK_CLEAR_API_SIGN = 300000; //任务时间-清理api签名,单位为毫秒
    const TIME_TASK_CLEAR_LOCAL_USER = 300000; //任务时间-清理本地用户信息,单位为毫秒
    const TIME_TASK_CLEAR_LOCAL_WX = 300000; //任务时间-清理本地微信,单位为毫秒
    const TIME_TASK_REFRESH_TOKEN_EXPIRE = 540000; //任务时间-刷新令牌到期时间,单位为毫秒

    //任务常量,4位字符串,数字和字母组成,纯数字的为框架内部任务,其他为自定义任务
    const TASK_TYPE_CLEAR_API_SIGN_CACHE = '0001'; //任务类型-清理api签名缓存
    const TASK_TYPE_CLEAR_LOCAL_USER_CACHE = '0002'; //任务类型-清除本地用户信息缓存
    const TASK_TYPE_CLEAR_LOCAL_WX_CACHE = '0003'; //任务类型-清除本地微信缓存
    const TASK_TYPE_TIME_WHEEL_TASK = '0004'; //任务类型-时间轮任务
    const TASK_TYPE_REFRESH_TOKEN_EXPIRE = '0005'; //任务类型-刷新令牌到期时间

    //消息队列常量
    const MESSAGE_QUEUE_TYPE_REDIS = 'redis'; //类型-redis
    const MESSAGE_QUEUE_TYPE_KAFKA = 'kafka'; //类型-kafka
    const MESSAGE_QUEUE_TYPE_RABBIT = 'rabbit'; //类型-rabbit
}