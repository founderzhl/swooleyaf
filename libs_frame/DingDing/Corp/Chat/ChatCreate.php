<?php
/**
 * Created by PhpStorm.
 * User: 姜伟
 * Date: 19-2-3
 * Time: 下午1:45
 */
namespace DingDing\Corp\Chat;

use Constant\ErrorCode;
use DingDing\TalkBaseCorp;
use DingDing\TalkTraitCorp;
use Exception\DingDing\TalkException;
use Tool\Tool;

/**
 * 创建会话
 * @package DingDing\Corp\Chat
 */
class ChatCreate extends TalkBaseCorp
{
    use TalkTraitCorp;

    /**
     * 群名称
     * @var string
     */
    private $name = '';
    /**
     * 群主
     * @var string
     */
    private $owner = '';
    /**
     * 成员列表
     * @var array
     */
    private $useridlist = [];
    /**
     * 新成员查看聊天历史消息标识 0:否 1:是
     * @var int
     */
    private $showHistoryType = 0;
    /**
     * 搜索类型 0:默认,不可搜索 1:可搜索
     * @var int
     */
    private $searchable = 0;
    /**
     * 验证类型 0:默认,不验证 1:验证
     * @var int
     */
    private $validationType = 0;
    /**
     * 通知所有人权限 0:默认,所有人 1:仅群主
     * @var int
     */
    private $mentionAllAuthority = 0;
    /**
     * 管理类型 0:默认,所有人可管理 1:仅群主可管理
     * @var int
     */
    private $managementType = 0;

    public function __construct(string $corpId, string $agentTag)
    {
        parent::__construct();
        $this->_corpId = $corpId;
        $this->_agentTag = $agentTag;
        $this->reqData['useridlist'] = [];
        $this->reqData['showHistoryType'] = 0;
        $this->reqData['searchable'] = 1;
        $this->reqData['validationType'] = 0;
        $this->reqData['mentionAllAuthority'] = 0;
        $this->reqData['managementType'] = 1;
    }

    private function __clone()
    {
    }

    /**
     * @param string $name
     * @throws \Exception\DingDing\TalkException
     */
    public function setName(string $name)
    {
        if (strlen($name) > 0) {
            $this->reqData['name'] = mb_substr($name, 0, 10);
        } else {
            throw new TalkException('群名称不合法', ErrorCode::DING_TALK_PARAM_ERROR);
        }
    }

    /**
     * @param string $owner
     * @throws \Exception\DingDing\TalkException
     */
    public function setOwner(string $owner)
    {
        if (ctype_alnum($owner)) {
            $this->reqData['owner'] = $owner;
        } else {
            throw new TalkException('群主不合法', ErrorCode::DING_TALK_PARAM_ERROR);
        }
    }

    /**
     * @param array $userList
     * @throws \Exception\DingDing\TalkException
     */
    public function setUserList(array $userList)
    {
        $users = [];
        foreach ($userList as $eUserId) {
            if (ctype_alnum($eUserId)) {
                $users[$eUserId] = 1;
            }
        }

        $userNum = count($users);
        if ($userNum == 0) {
            throw new TalkException('成员列表不能为空', ErrorCode::DING_TALK_PARAM_ERROR);
        } elseif ($userNum > 40) {
            throw new TalkException('成员不能超过40个', ErrorCode::DING_TALK_PARAM_ERROR);
        }
        $this->reqData['useridlist'] = array_keys($users);
    }

    /**
     * @param int $showHistoryType
     * @throws \Exception\DingDing\TalkException
     */
    public function setShowHistoryType(int $showHistoryType)
    {
        if (in_array($showHistoryType, [0, 1], true)) {
            $this->reqData['showHistoryType'] = $showHistoryType;
        } else {
            throw new TalkException('新成员查看聊天历史消息标识不合法', ErrorCode::DING_TALK_PARAM_ERROR);
        }
    }

    /**
     * @param int $searchable
     * @throws \Exception\DingDing\TalkException
     */
    public function setSearchable(int $searchable)
    {
        if (in_array($searchable, [0, 1], true)) {
            $this->reqData['searchable'] = $searchable;
        } else {
            throw new TalkException('搜索类型不合法', ErrorCode::DING_TALK_PARAM_ERROR);
        }
    }

    /**
     * @param int $validationType
     * @throws \Exception\DingDing\TalkException
     */
    public function setValidationType(int $validationType)
    {
        if (in_array($validationType, [0, 1], true)) {
            $this->reqData['validationType'] = $validationType;
        } else {
            throw new TalkException('验证类型不合法', ErrorCode::DING_TALK_PARAM_ERROR);
        }
    }

    /**
     * @param int $mentionAllAuthority
     * @throws \Exception\DingDing\TalkException
     */
    public function setMentionAllAuthority(int $mentionAllAuthority)
    {
        if (in_array($mentionAllAuthority, [0, 1], true)) {
            $this->reqData['mentionAllAuthority'] = $mentionAllAuthority;
        } else {
            throw new TalkException('通知所有人权限不合法', ErrorCode::DING_TALK_PARAM_ERROR);
        }
    }

    /**
     * @param int $managementType
     * @throws \Exception\DingDing\TalkException
     */
    public function setManagementType(int $managementType)
    {
        if (in_array($managementType, [0, 1], true)) {
            $this->reqData['managementType'] = $managementType;
        } else {
            throw new TalkException('管理类型不合法', ErrorCode::DING_TALK_PARAM_ERROR);
        }
    }

    public function getDetail() : array
    {
        if (!isset($this->reqData['name'])) {
            throw new TalkException('群名称不能为空', ErrorCode::DING_TALK_PARAM_ERROR);
        }
        if (!isset($this->reqData['owner'])) {
            throw new TalkException('群主不能为空', ErrorCode::DING_TALK_PARAM_ERROR);
        }
        if (empty($this->reqData['useridlist'])) {
            throw new TalkException('成员列表不能为空', ErrorCode::DING_TALK_PARAM_ERROR);
        }

        $this->curlConfigs[CURLOPT_URL] = $this->serviceDomain . '/chat/create?' . http_build_query([
            'access_token' => $this->getAccessToken(TalkBaseCorp::ACCESS_TOKEN_TYPE_CORP, $this->_corpId, $this->_agentTag),
        ]);
        $this->curlConfigs[CURLOPT_POSTFIELDS] = Tool::jsonEncode($this->reqData, JSON_UNESCAPED_UNICODE);
        return $this->sendRequest('POST');
    }
}
