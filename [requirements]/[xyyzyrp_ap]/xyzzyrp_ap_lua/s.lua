function xyzzyrp_ap_ban(arg1, arg2, jednostka, arg4)
    if (jednostka=="m") then
        jednostka="MINUTE"
    elseif (jednostka=="h" or jednostka=="g") then
        jednostka="HOUR"
    elseif (jednostka=="d") then
        jednostka="DAY"
    end

    for i,v in ipairs(getElementsByType("player")) do
        iprint(getElementData(v, "auth:uid"), arg1)
        if getElementData(v, "auth:uid") and  ""..getElementData(v, "auth:uid").."" == arg1 then
            kickPlayer(v, "Polacz sie od nowa.")
            print("kick")
        end
    end

    if exports.DB2:zapytanie("INSERT INTO lss_bany VALUES(NULL,"..arg1..",NULL,NOW(),NOW()+INTERVAL "..arg2.." "..jednostka..",'"..arg4.."',NULL,1)") then 
        return true
    else
        return false
    end
    
end

function xyzzyrp_ap_kick(arg1, arg2)
    for i,v in ipairs(getElementsByType("player")) do
        iprint(getElementData(v, "auth:uid"), arg1)
        if getElementData(v, "auth:uid") and  ""..getElementData(v, "auth:uid").."" == arg1 then
            kickPlayer(v, arg2)
            return true
        end
    end
    return false
end

function xyzzyrp_ap_aj(arg1, arg2, ...)
    for i,v in ipairs(getElementsByType("player")) do
        if getElementData(v, "auth:uid") and  ""..getElementData(v, "auth:uid").."" == arg1 then
            local reason = table.concat( arg, " " )
            local supportLogin = "Panel HTTP ()"
            local q=string.format("UPDATE lss_users SET blokada_aj=%d WHERE id=%d LIMIT 1", arg2, arg1)
            local czas = arg2
            exports.DB2:zapytanie(q)
            local character=getElementData(v,"character")
            outputChatBox("* " .. supportLogin .. " nałożył AJ (" .. czas .. " min) na: " .. getPlayerName(v) .. ", powod: " .. reason, v, 255,0,0,true)
            triggerClientEvent("showAnnouncement", root, supportLogin .. " nałożył AJ (" .. czas .. " min) na: " .. getPlayerName(v) .. ", powód: " .. reason, 15)
            setElementData(v, "kary:blokada_aj", czas)
            removePedFromVehicle(v)
            setElementInterior(v,10)
            setElementDimension(v,2000+(character and tonumber(character.id) or 0))
            setElementPosition(v, 215.53,109.52,999.02)
            return true
        end
    end
    if exports.DB2:zapytanie(string.format("UPDATE lss_users SET blokada_aj=%d WHERE id=%d LIMIT 1", arg2, arg1)) then
        return true
    else
        return false
    end
end

function xyzzyrp_ap_booc(arg1, arg2, arg3, arg4, ...)
	jednostka=string.lower(arg3)
	if (jednostka=="m") then
		jednostka="MINUTE"
	elseif (jednostka=="h" or jednostka=="g") then
		jednostka="HOUR"
	elseif (jednostka=="d") then
		jednostka="DAY"
	end
    for i,v in ipairs(getElementsByType("player")) do
        if getElementData(v, "auth:uid") and  ""..getElementData(v, "auth:uid").."" == arg1 then
            local reason = table.concat( arg, " " )
            local supportLogin = "Panel HTTP ("..arg4..")"
            local q=string.format("UPDATE lss_users SET blokada_ooc=NOW()+INTERVAL %d %s WHERE id=%d LIMIT 1", arg2, jednostka, arg1)
            exports.DB2:zapytanie(q)
            outputChatBox("* " .. supportLogin .. " nałożył blokade OOC na: " .. getPlayerName(v) .. ", powod: " .. reason, v, 255,0,0,true)
            triggerClientEvent("showAnnouncement", root, supportLogin .. " nałożył blokadę OOC na: " .. getPlayerName(v) .. ", powód: " .. reason, 15)
            setElementData(v, "kary:blokada_ooc", tostring(arg2) .. " " .. jednostka .. " (połącz się ponownie aby poznać dokładny czas)")
            return true
        end
    end
    if exports.DB2:zapytanie(string.format("UPDATE lss_users SET blokada_ooc=NOW()+INTERVAL %d %s WHERE id=%d LIMIT 1", arg2, jednostka, arg1)) then
        return true
    else
        return false
    end
end

function xyzzyrp_ap_addgp(arg1, arg2, ...)
    for i,v in ipairs(getElementsByType("player")) do
        iprint(getElementData(v, "auth:uid"), arg1)
        if getElementData(v, "auth:uid") and  ""..getElementData(v, "auth:uid").."" == arg1 then
            local reason = table.concat( arg, " " )
            triggerClientEvent(v, "showAchievement", root, 5, "Zostałeś/aś nagrodzony/a dodatkowymi punktami GP!", reason.. "  +"..arg2.."GP")
            setElementData(v, "GP", getElementData(v, "GP") + arg2)
            exports.DB2:zapytanie("UPDATE lss_users SET gp = gp + "..arg2.." WHERE id = "..arg1.."")
            return true
        end
    end
    if exports.DB2:zapytanie("UPDATE lss_users SET gp = gp + "..arg2.." WHERE id = "..arg1.."") then
        return true
    else
        return false
    end
end

function xyzzyrp_ap_blockpm(arg1, arg2, arg3, arg4, ...)
	jednostka=string.lower(arg3)
	if (jednostka=="m") then
		jednostka="MINUTE"
	elseif (jednostka=="h" or jednostka=="g") then
		jednostka="HOUR"
	elseif (jednostka=="d") then
		jednostka="DAY"
	end
    for i,v in ipairs(getElementsByType("player")) do
        iprint(getElementData(v, "auth:uid"), arg1)
        if getElementData(v, "auth:uid") and  ""..getElementData(v, "auth:uid").."" == arg1 then
            local reason = table.concat( arg, " " )
            local supportLogin = "Panel HTTP ("..arg4..")"
            local q=string.format("UPDATE lss_users SET blokada_pm=NOW()+INTERVAL %d %s WHERE id='%d' LIMIT 1", arg2, jednostka, arg1)
            exports.DB2:zapytanie(q)
            outputChatBox("* " .. supportLogin .. " nałożył blokade PM na: " .. getPlayerName(v) .. ", powod: " .. reason, v, 255,0,0,true)
            triggerClientEvent("showAnnouncement", root, supportLogin .. " nałożył blokadę OOC na: " .. getPlayerName(v) .. ", powód: " .. reason, 15)
            setElementData(v, "kary:blokada_pm", tostring(arg2) .. " " .. jednostka .. " (połącz się ponownie aby poznać dokładny czas)")
            return true
        end
    end
    if exports.DB2:zapytanie(string.format("UPDATE lss_users SET blokada_pm=NOW()+INTERVAL %d %s WHERE id=%d LIMIT 1", arg2, jednostka, arg1)) then
        return true
    else
        return false
    end
end

function xyzzyrp_ap_blockbeat(arg1, arg2, arg3, arg4, ...)
	jednostka=string.lower(arg3)
	if (jednostka=="m") then
		jednostka="MINUTE"
	elseif (jednostka=="h" or jednostka=="g") then
		jednostka="HOUR"
	elseif (jednostka=="d") then
		jednostka="DAY"
	end
    for i,v in ipairs(getElementsByType("player")) do
        if getElementData(v, "auth:uid") and  ""..getElementData(v, "auth:uid").."" == arg1 then
            local reason = table.concat( arg, " " )
            local supportLogin = "Panel HTTP ("..arg4..")"
            local q=string.format("UPDATE lss_users SET blokada_bicia=NOW()+INTERVAL %d %s WHERE id=%d LIMIT 1", arg2, jednostka, arg1)
            exports.DB2:zapytanie(q)
            outputChatBox("* " .. supportLogin .. " nałożył blokade bicia/ataku na: " .. getPlayerName(v) .. ", powod: " .. reason, v, 255,0,0,true)
            triggerClientEvent("showAnnouncement", root, supportLogin .. " nałożył blokadę bicia/ataku na: " .. getPlayerName(v) .. ", powód: " .. reason, 15)
            setElementData(v, "kary:blokada_bicia", tostring(arg2) .. " " .. jednostka .. " (połącz się ponownie aby poznać dokładny czas)")
            toggleControl(target, "fire", false)
            toggleControl(target, "aim_weapon", false)
            return true
        end
    end
    if exports.DB2:zapytanie(string.format("UPDATE lss_users SET blokada_bicia=NOW()+INTERVAL %d %s WHERE id=%d LIMIT 1", arg2, jednostka, arg1)) then
        return true
    else
        return false
    end
end

function xyzzyrp_ap_premiumskin(arg1, arg2, arg3)
    for i,v in ipairs(getElementsByType("player")) do
        if getElementData(v, "auth:uid") and  ""..getElementData(v, "auth:uid").."" == arg1 then
            setElementModel(v, arg2)
            exports.DB2:zapytanie(string.format("UPDATE lss_characters SET skin=%d WHERE userid=%d LIMIT 1", arg2, arg1))
            outputChatBox("* Panel HTTP ("..arg3..") ustawił ci skina o ID: "..arg2.."",v)
            return true
        end
    end
    if exports.DB2:zapytanie(string.format("UPDATE lss_characters SET skin=%d WHERE userid=%d LIMIT 1", arg2, arg1)) then
        return true
    else
        return false
    end
end

function xyzzyrp_ap_dashboardata()
    local slots = getServerConfigSetting("maxplayers") or 0
    local Players_Online = getPlayerCount() or 0
    local registered = exports.DB2:pobierzWyniki("SELECT id FROM lss_users ORDER BY id DESC LIMIT 1")
    local IP = getServerConfigSetting ("serverip") or "BŁĄD!"
    local port = getServerPort()
    if registered and registered['id'] then 
        registered = registered['id']
    else
        registered = 'Błąd DB2'
    end
    return slots, Players_Online, registered, IP, port
end

local maxPlayerToday = 0
addEventHandler("onPlayerJoin", root, function()
    if getPlayerCount() > maxPlayerToday then
        maxPlayerToday = getPlayerCount()
        if exports.DB2:pobierzWyniki("SELECT * FROM xyzzyrp_chart WHERE date = CURDATE()") then
            exports.DB2:zapytanie("UPDATE xyzzyrp_chart SET players = "..maxPlayerToday.." WHERE date = CURDATE()")
        else
            exports.DB2:zapytanie("INSERT xyzzyrp_chart SET players = "..maxPlayerToday..", date = CURDATE()")
        end
    end
end)
setTimer(function()

    if getRealTime().hour == 0 then
        if exports.DB2:pobierzWyniki("SELECT * FROM xyzzyrp_chart WHERE date = CURDATE()") then
            -- 
        else
            exports.DB2:zapytanie("INSERT xyzzyrp_chart SET players = "..getPlayerCount()..", date = CURDATE()")
            maxPlayerToday = getPlayerCount()
        end
    end
end, 1000 * 60 * 60, 0)