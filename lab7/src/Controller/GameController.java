package Controller;

import Model.Player;

public class GameController {

    private static GameController instance = null;
    private Player p1,p2;

    private GameController()
    {
        int[][] b1 = new int[][]{{0, 0,0,1},
                {0,0,0,1},
                {0,0,0,1},
                {1,1,0,0}

        };
        this.p1 = new Player(b1);

        int[][] b2 = new int[][]{{0,1,1,0},
                {1,0,0,0},
                {1,0,0,0},
                {1,0,0,0}
        };

        this.p2 = new Player(b2);
    }

    public static GameController getInstance()
    {
        if (instance == null)
            instance = new GameController();

        return instance;
    }

    public boolean firstWin()
    {
       return p1.youLost();
    }

    public boolean secondWind()
    {
        return p2.youLost();
    }

    public Player getPlayer1() {return p1;}

    public Player getPlayer2() {return p2;}



}
