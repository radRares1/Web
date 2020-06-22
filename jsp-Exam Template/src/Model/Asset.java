package Model;

public class Asset {
    private int aid;
    private int userid;
    private String name;
    private String desc;
    private int value;



    public Asset(int aid, int userid, String name, String desc, int value) {
        this.aid = aid;
        this.userid = userid;
        this.name = name;
        this.desc = desc;
        this.value = value;
    }

    public int getAid() {
        return aid;
    }

    public void setAid(int aid) {
        this.aid = aid;
    }

    public int getUserid() {
        return userid;
    }

    public void setUserid(int userid) {
        this.userid = userid;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getDesc() {
        return desc;
    }

    public void setDesc(String desc) {
        this.desc = desc;
    }

    public int getValue() {
        return value;
    }

    public void setValue(int value) {
        this.value = value;
    }

    @Override
    public String toString() {
        return "Asset{" +
                "aid=" + aid +
                ", userid=" + userid +
                ", name='" + name + '\'' +
                ", desc='" + desc + '\'' +
                ", value=" + value +
                '}';
    }
}
