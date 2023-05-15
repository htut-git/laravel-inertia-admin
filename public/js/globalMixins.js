import moment from 'moment';

export const globalMixins = {
  methods: {
    time(time,format = 'YYYY-MM-DD HH:mm:ss') {
        if (!time) return '';
        return moment.utc(time).local().format(format);
    }
  },
};
