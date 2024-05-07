CREATE TABLE IF NOT EXISTS player (
    id VARCHAR(255) PRIMARY KEY,
    email VARCHAR(255),
    token INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS friend (
    player_id VARCHAR(255),
    friend_id VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (player_id, friend_id)
);

CREATE TABLE IF NOT EXISTS team (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    created_by VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES player(id)
);

CREATE TABLE IF NOT EXISTS team_member (
    team_id INT,
    player_id VARCHAR(255),
    PRIMARY KEY (team_id, player_id),
    FOREIGN KEY (team_id) REFERENCES team(id),
    FOREIGN KEY (player_id) REFERENCES player(id)
);

CREATE TABLE IF NOT EXISTS bo (
    id SERIAL PRIMARY KEY,
    type INT NOT NULL,
    start_at TIMESTAMP,
    token INT,
    nb_bo INT,
    team1_id INT,
    team2_id INT,
    winner INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (team1_id) REFERENCES team(id),
    FOREIGN KEY (team2_id) REFERENCES team(id),
    FOREIGN KEY (winner) REFERENCES team(id)
);

CREATE TABLE IF NOT EXISTS bo_match (
    match_id SERIAL PRIMARY KEY,
    bo_id INT,
    winner INT,
    score_team1 INT,
    score_team2 INT,
    UNIQUE (bo_id),
    FOREIGN KEY (bo_id) REFERENCES bo(id),
    FOREIGN KEY (winner) REFERENCES team(id)
);

CREATE TABLE IF NOT EXISTS notification (
    id VARCHAR(255) PRIMARY KEY,
    send_by VARCHAR(255),
    recieve_by VARCHAR(255),
    message TEXT,
    send_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    response_at TIMESTAMP,
    response INT,
    expire_at TIMESTAMP,
    FOREIGN KEY (send_by) REFERENCES player(id),
    FOREIGN KEY (recieve_by) REFERENCES player(id)
);

CREATE TABLE IF NOT EXISTS notification_friend (
    notification_id VARCHAR(255),
    FOREIGN KEY (notification_id) REFERENCES notification(id)
);

CREATE TABLE IF NOT EXISTS notification_match (
    notification_id VARCHAR(255),
    bo_id INT,
    FOREIGN KEY (notification_id) REFERENCES notification(id),
    FOREIGN KEY (bo_id) REFERENCES bo(id)
);